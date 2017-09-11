<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

class ControllerextensionmoduleMoyskladOC23Synch12 extends Controller {
 
    public function index() {
        
        $this->document->addStyle('admin/view/stylesheet/moyskladOC2_3Synch.css');
        $this->document->addScript('admin/view/javascript/jquery/tabs.js');
       
        $this->load->language('extension/module/moyskladOC23Synch12');
        $this->load->model('tool/image');

        //$this->document->title = $this->language->get('heading_title');
        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->request->post['moyskladOC23Synch12_order_date'] = $this->config->get('moyskladOC23Synch12_order_date');
            $this->model_setting_setting->editSetting('moyskladOC23Synch12', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
        }

        $data['heading_title'] = $this->language->get('heading_title');
        $data['entry_username'] = $this->language->get('entry_username');
        $data['entry_password'] = $this->language->get('entry_password');
        $data['entry_allow_ip'] = $this->language->get('entry_allow_ip');
        $data['text_price_default'] = $this->language->get('text_price_default');
        $data['entry_config_price_type'] = $this->language->get('entry_config_price_type');

        $data['entry_customer_group'] = $this->language->get('entry_customer_group');
        $data['entry_quantity'] = $this->language->get('entry_quantity');
        $data['entry_priority'] = $this->language->get('entry_priority');
        $data['entry_flush_product'] = $this->language->get('entry_flush_product');
        $data['entry_flush_category'] = $this->language->get('entry_flush_category');
        $data['entry_flush_manufacturer'] = $this->language->get('entry_flush_manufacturer');
        $data['entry_flush_quantity'] = $this->language->get('entry_flush_quantity');
        $data['entry_flush_attribute'] = $this->language->get('entry_flush_attribute');
        $data['entry_fill_parent_cats'] = $this->language->get('entry_fill_parent_cats');
        $data['entry_seo_url'] = $this->language->get('entry_seo_url');
        $data['entry_full_log'] = $this->language->get('entry_full_log');
        $data['entry_apply_watermark'] = $this->language->get('entry_apply_watermark');
        $data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
        $data['text_image_manager'] = $this->language->get('text_image_manager');
        $data['text_browse'] = $this->language->get('text_browse');
        $data['text_clear'] = $this->language->get('text_clear');
        $data['entry_name'] = $this->language->get('entry_name');
        $data['entry_image'] = $this->language->get('entry_image');

        $data['entry_relatedoptions'] = $this->language->get('entry_relatedoptions');
        $data['entry_relatedoptions_help'] = $this->language->get('entry_relatedoptions_help');
        $data['entry_order_status_to_exchange'] = $this->language->get('entry_order_status_to_exchange');
        $data['entry_order_status_to_exchange_not'] = $this->language->get('entry_order_status_to_exchange_not');

        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_tab_general'] = $this->language->get('text_tab_general');
        $data['text_tab_product'] = $this->language->get('text_tab_product');
        $data['text_tab_order'] = $this->language->get('text_tab_order');
        $data['text_tab_manual'] = $this->language->get('text_tab_manual');
        $data['text_empty'] = $this->language->get('text_empty');
        $data['text_max_filesize'] = sprintf($this->language->get('text_max_filesize'), @ini_get('max_file_uploads'));
        $data['text_homepage'] = $this->language->get('text_homepage');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_order_status'] = $this->language->get('entry_order_status');
        $data['entry_order_currency'] = $this->language->get('entry_order_currency');
        $data['entry_order_notify'] = $this->language->get('entry_order_notify');
        $data['entry_upload'] = $this->language->get('entry_upload');
        $data['button_upload'] = $this->language->get('button_upload');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_insert'] = $this->language->get('button_insert');
        $data['button_remove'] = $this->language->get('button_remove');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        }
        else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['image'])) {
            $data['error_image'] = $this->error['image'];
        } else {
            $data['error_image'] = '';
        }

        if (isset($this->error['moyskladOC23Synch12_username'])) {
            $data['error_moyskladOC23Synch12_username'] = $this->error['moyskladOC23Synch12_username'];
        }
        else {
            $data['error_moyskladOC23Synch12_username'] = '';
        }

        if (isset($this->error['moyskladOC23Synch12_password'])) {
            $data['error_moyskladOC23Synch12_password'] = $this->error['moyskladOC23Synch12_password'];
        }
        else {
            $data['error_moyskladOC23Synch12_password'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/moyskladOC23Synch12', 'token=' . $this->session->data['token'], true)
        );
        $data['token'] = $this->session->data['token'];

        $data['action'] = $this->url->link('extension/module/moyskladOC23Synch12', 'token=' . $this->session->data['token'], true);

        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);

        if (isset($this->request->post['moyskladOC23Synch12_username'])) {
            $data['moyskladOC23Synch12_username'] = $this->request->post['moyskladOC23Synch12_username'];
        }
        else {
            $data['moyskladOC23Synch12_username'] = $this->config->get('moyskladOC23Synch12_username');
        }

        if (isset($this->request->post['moyskladOC23Synch12_password'])) {
            $data['moyskladOC23Synch12_password'] = $this->request->post['moyskladOC23Synch12_password'];
        }
        else {
            $data['moyskladOC23Synch12_password'] = $this->config->get('moyskladOC23Synch12_password');
        }

        if (isset($this->request->post['moyskladOC23Synch12_allow_ip'])) {
            $data['moyskladOC23Synch12_allow_ip'] = $this->request->post['moyskladOC23Synch12_allow_ip'];
        }
        else {
            $data['moyskladOC23Synch12_allow_ip'] = $this->config->get('moyskladOC23Synch12_allow_ip');
        }

        if (isset($this->request->post['moyskladOC23Synch12_status'])) {
            $data['moyskladOC23Synch12_status'] = $this->request->post['moyskladOC23Synch12_status'];
        }
        else {
            $data['moyskladOC23Synch12_status'] = $this->config->get('moyskladOC23Synch12_status');
        }

        if (isset($this->request->post['moyskladOC23Synch12_price_type'])) {
            $data['moyskladOC23Synch12_price_type'] = $this->request->post['moyskladOC23Synch12_price_type'];
        }
        else {
            $data['moyskladOC23Synch12_price_type'] = $this->config->get('moyskladOC23Synch12_price_type');
            if(empty($data['moyskladOC23Synch12_price_type'])) {
                $data['moyskladOC23Synch12_price_type'][] = array(
                    'keyword'           => '',
                    'customer_group_id'     => 0,
                    'quantity'          => 0,
                    'priority'          => 0
                );
            }
        }

        if (isset($this->request->post['moyskladOC23Synch12_flush_product'])) {
            $data['moyskladOC23Synch12_flush_product'] = $this->request->post['moyskladOC23Synch12_flush_product'];
        }
        else {
            $data['moyskladOC23Synch12_flush_product'] = $this->config->get('moyskladOC23Synch12_flush_product');
        }

        if (isset($this->request->post['moyskladOC23Synch12_flush_category'])) {
            $data['moyskladOC23Synch12_flush_category'] = $this->request->post['moyskladOC23Synch12_flush_category'];
        }
        else {
            $data['moyskladOC23Synch12_flush_category'] = $this->config->get('moyskladOC23Synch12_flush_category');
        }

        if (isset($this->request->post['moyskladOC23Synch12_flush_manufacturer'])) {
            $data['moyskladOC23Synch12_flush_manufacturer'] = $this->request->post['moyskladOC23Synch12_flush_manufacturer'];
        }
        else {
            $data['moyskladOC23Synch12_flush_manufacturer'] = $this->config->get('moyskladOC23Synch12_flush_manufacturer');
        }

        if (isset($this->request->post['moyskladOC23Synch12_flush_quantity'])) {
            $data['moyskladOC23Synch12_flush_quantity'] = $this->request->post['moyskladOC23Synch12_flush_quantity'];
        }
        else {
            $data['moyskladOC23Synch12_flush_quantity'] = $this->config->get('moyskladOC23Synch12_flush_quantity');
        }

        if (isset($this->request->post['moyskladOC23Synch12_flush_attribute'])) {
            $data['moyskladOC23Synch12_flush_attribute'] = $this->request->post['moyskladOC23Synch12_flush_attribute'];
        }
        else {
            $data['moyskladOC23Synch12_flush_attribute'] = $this->config->get('moyskladOC23Synch12_flush_attribute');
        }

        if (isset($this->request->post['moyskladOC23Synch12_fill_parent_cats'])) {
            $data['moyskladOC23Synch12_fill_parent_cats'] = $this->request->post['moyskladOC23Synch12_fill_parent_cats'];
        }
        else {
            $data['moyskladOC23Synch12_fill_parent_cats'] = $this->config->get('moyskladOC23Synch12_fill_parent_cats');
        }

        if (isset($this->request->post['moyskladOC23Synch12_relatedoptions'])) {
            $data['moyskladOC23Synch12_relatedoptions'] = $this->request->post['moyskladOC23Synch12_relatedoptions'];
        } else {
            $data['moyskladOC23Synch12_relatedoptions'] = $this->config->get('moyskladOC23Synch12_relatedoptions');
        }
        if (isset($this->request->post['moyskladOC23Synch12_order_status_to_exchange'])) {
            $data['moyskladOC23Synch12_order_status_to_exchange'] = $this->request->post['moyskladOC23Synch12_order_status_to_exchange'];
        } else {
            $data['moyskladOC23Synch12_order_status_to_exchange'] = $this->config->get('moyskladOC23Synch12_order_status_to_exchange');
        }

        if (isset($this->request->post['moyskladOC23Synch12_seo_url'])) {
            $data['moyskladOC23Synch12_seo_url'] = $this->request->post['moyskladOC23Synch12_seo_url'];
        }
        else {
            $data['moyskladOC23Synch12_seo_url'] = $this->config->get('moyskladOC23Synch12_seo_url');
        }

        if (isset($this->request->post['moyskladOC23Synch12_full_log'])) {
            $data['moyskladOC23Synch12_full_log'] = $this->request->post['moyskladOC23Synch12_full_log'];
        }
        else {
            $data['moyskladOC23Synch12_full_log'] = $this->config->get('moyskladOC23Synch12_full_log');
        }

        if (isset($this->request->post['moyskladOC23Synch12_apply_watermark'])) {
            $data['moyskladOC23Synch12_apply_watermark'] = $this->request->post['moyskladOC23Synch12_apply_watermark'];
        }
        else {
            $data['moyskladOC23Synch12_apply_watermark'] = $this->config->get('moyskladOC23Synch12_apply_watermark');
        }

        if (isset($this->request->post['moyskladOC23Synch12_watermark'])) {
            $data['moyskladOC23Synch12_watermark'] = $this->request->post['moyskladOC23Synch12_watermark'];
        }
        else {
            $data['moyskladOC23Synch12_watermark'] = $this->config->get('moyskladOC23Synch12_watermark');
        }

        if (isset($data['moyskladOC23Synch12_watermark'])) {

            $data['thumb'] = $this->model_tool_image->resize($data['moyskladOC23Synch12_watermark'], 100, 100);
        }
        else {
            $data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
        }

        if (isset($this->request->post['moyskladOC23Synch12_order_status'])) {
            $data['moyskladOC23Synch12_order_status'] = $this->request->post['moyskladOC23Synch12_order_status'];
        }
        else {
            $data['moyskladOC23Synch12_order_status'] = $this->config->get('moyskladOC23Synch12_order_status');
        }

        if (isset($this->request->post['moyskladOC23Synch12_order_currency'])) {
            $data['moyskladOC23Synch12_order_currency'] = $this->request->post['moyskladOC23Synch12_order_currency'];
        }
        else {
            $data['moyskladOC23Synch12_order_currency'] = $this->config->get('moyskladOC23Synch12_order_currency');
        }

        if (isset($this->request->post['moyskladOC23Synch12_order_notify'])) {
            $data['moyskladOC23Synch12_order_notify'] = $this->request->post['moyskladOC23Synch12_order_notify'];
        }
        else {
            $data['moyskladOC23Synch12_order_notify'] = $this->config->get('moyskladOC23Synch12_order_notify');
        }

        // Группы
        $this->load->model('customer/customer_group');
        $data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

        $this->load->model('localisation/order_status');

        $order_statuses = $this->model_localisation_order_status->getOrderStatuses();

        foreach ($order_statuses as $order_status) {
            $data['order_statuses'][] = array(
                'order_status_id' => $order_status['order_status_id'],
                'name'            => $order_status['name']
            );
        }

        $this->template = 'extension/module/moyskladOC23Synch12.tpl';
        $this->children = array(
            'common/header',
            'common/footer' 
        );

        $data['heading_title'] = $this->language->get('heading_title');
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        $this->response->setOutput($this->load->view('extension/module/moyskladOC23Synch12.tpl', $data));

        //$this->response->setOutput($this->render(), $this->config->get('config_compression'));
    }

    private function validate() {

        if (!$this->user->hasPermission('modify', 'extension/module/moyskladOC23Synch12')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;

    }

   

}
?>