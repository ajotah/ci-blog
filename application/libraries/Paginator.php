<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paginator
{
    public static $options = array();

    function get_links($resources_name, $css_framework=null)
    {
        $ci = & get_instance();
        $method = $ci->router->fetch_method();
        $ci->load->library('pagination');

        if(in_array($css_framework, ['bootstrap3', 'bootstrap4', 'bulma'])){
            $method_name = $css_framework."_config";
            $config = $this->$method_name();
        }

        $total_options = count(Paginator::$options);
        $resource_ref = $total_options - ($total_options - 1);

        if(Paginator::$options[$resource_ref]['query_string']){
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'page';
            $base_url_method = '';
        }else{
            $base_url_method = '/'.$method;
        }

        $base_url = Paginator::$options[$resource_ref]['base_url'] ? Paginator::$options[$resource_ref]['base_url'] : "{$resources_name}{$base_url_method}";

        $config['use_page_numbers'] = TRUE; // without this the index will start at 0
        $config['base_url'] = site_url($base_url);
        $config['total_rows'] = Paginator::$options[$resource_ref]['total_rows']; # $ci->db->count_all_results($resources_name);
        $config['per_page'] = Paginator::$options[$resource_ref]['per_page'];

        $ci->pagination->initialize($config);

        return $ci->pagination->create_links();

    }

    function paginate($resources, $optional = array())
    {

        $per_page = isset($optional['per_page']) ? $optional['per_page'] : 10;
        $query_string = isset($optional['query_string']) ? $optional['query_string'] : true;
        $base_url = isset($optional['base_url']) ? $optional['base_url'] : null;

        $resource_ref = count(Paginator::$options) +1;

        Paginator::$options[$resource_ref] = array('per_page' => $per_page,
                                                'query_string' => $query_string,
                                                'base_url' =>$base_url);

        $ci = & get_instance();
        $limit = $per_page;

        if(Paginator::$options[$resource_ref]['query_string']){
            // substruct 1 from $ci->input->get('page', TRUE) because we are using page number instead of indexes
            $offset = !empty($ci->input->get('page', TRUE)) ? $ci->input->get('page', TRUE) : 1;
        }else{
            $offset = !empty($ci->uri->segment(3)) ? $ci->uri->segment(3) : 1;
        }

        if( !preg_match('/^\d+$/', $offset) ){
            # $offset isn't a number
            $offset = 1; // set to the first page
        }

        # if $resouces is a query object
        if(is_object($resources) && property_exists($resources, 'dbdriver')){

            # make a copy of the db object, because after calling count_all_results() the db object details will be gone
            $db_copy = clone $resources;

            Paginator::$options[$resource_ref]['total_rows'] = $ci->db->count_all_results();

            $db_copy->limit($limit, $limit*($offset-1));

            $query = $db_copy->get();

            return $query->result_array();

        }elseif(is_string($resources)){

            if(isset($optional['where'])){

                $ci->db->where($optional['where']);

            }

            Paginator::$options[$resource_ref]['total_rows'] = $ci->db->count_all_results($resources);

            if(isset($optional['where'])){

                $ci->db->where($optional['where']);

            }

            if(isset($optional['order_by'])){

                $ci->db->order_by($optional['order_by']);

            }

            return $ci->db->get($resources, $limit, $limit*($offset-1))->result_array();

        }else{

            throw new Exception('Paginator::paginate =====> if you are using a custom object query please do not call "$this->db->get()" see the documentation for more!');

        }

    }

    function bootstrap3_config()
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';

        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        return $config;
    }

    function bootstrap4_config()
    {
        $config['attributes'] = array('class' => 'page-link');

        $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] 	= '</ul></nav></div>';

        $config['num_tag_open'] 	= '<li class="page-item"><span>';
        $config['num_tag_close'] 	= '</span></li>';

        $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';

        $config['next_tag_open'] 	= '<li class="page-item"><span>';
        $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';

        $config['prev_tag_open'] 	= '<li class="page-item"><span>';
        $config['prev_tagl_close'] 	= '</span></li>';

        $config['first_tag_open'] 	= '<li class="page-item"><span>';
        $config['first_tag_close'] = '</span></li>';

        $config['last_tag_open'] 	= '<li class="page-item"><span>';
        $config['last_tag_close'] 	= '</span></li>';

        return $config;
    }
    function bulma_config()
    {
        $config['attributes'] = array('class' => 'pagination-link');

        $config['full_tag_open'] 	= '<nav class="pagination" role="navigation" aria-label="pagination"> <ul class="pagination-list">
';
        $config['full_tag_close'] 	= '</ul></nav>';

        $config['num_tag_open'] 	= '<li>';
        $config['num_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li><a class="pagination-link is-current" aria-current="page">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['next_tag_open'] 	= '<li>
      <span class="pagination-ellipsis">&hellip;';
        $config['next_tagl_close'] 	= '</span></li>';

        $config['prev_tag_open'] 	= '<li>';
        $config['prev_tagl_close'] 	= '</li>';

        $config['first_tag_open'] 	= '<li>>';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] 	= '<li>';
        $config['last_tag_close'] 	= '</li>';

        return $config;
    }

}
