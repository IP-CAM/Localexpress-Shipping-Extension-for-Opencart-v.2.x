<?php
class ControllerShippingLocalExpress extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('shipping/local_express');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('local_express', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_select_all'] = $this->language->get('text_select_all');
		$data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_next_day_air'] = $this->language->get('text_next_day_air');
		$data['text_2nd_day_air'] = $this->language->get('text_2nd_day_air');
		$data['text_ground'] = $this->language->get('text_ground');
		$data['text_worldwide_express'] = $this->language->get('text_worldwide_express');
		$data['text_worldwide_express_plus'] = $this->language->get('text_worldwide_express_plus');
		$data['text_worldwide_expedited'] = $this->language->get('text_worldwide_expedited');
		$data['text_express'] = $this->language->get('text_express');
		$data['text_standard'] = $this->language->get('text_standard');
		$data['text_3_day_select'] = $this->language->get('text_3_day_select');
		$data['text_next_day_air_saver'] = $this->language->get('text_next_day_air_saver');
		$data['text_next_day_air_early_am'] = $this->language->get('text_next_day_air_early_am');
		$data['text_expedited'] = $this->language->get('text_expedited');
		$data['text_2nd_day_air_am'] = $this->language->get('text_2nd_day_air_am');
		$data['text_saver'] = $this->language->get('text_saver');
		$data['text_express_early_am'] = $this->language->get('text_express_early_am');
		$data['text_express_plus'] = $this->language->get('text_express_plus');
		$data['text_today_standard'] = $this->language->get('text_today_standard');
		$data['text_today_dedicated_courier'] = $this->language->get('text_today_dedicated_courier');
		$data['text_today_intercity'] = $this->language->get('text_today_intercity');
		$data['text_today_express'] = $this->language->get('text_today_express');
		$data['text_today_express_saver'] = $this->language->get('text_today_express_saver');

		$data['entry_key'] = $this->language->get('entry_key');
      $data['entry_channel_id'] = $this->language->get('entry_channel_id');
		$data['entry_retailer_id'] = $this->language->get('entry_retailer_id');
      $data['entry_shipping_price'] = $this->language->get('entry_shipping_price');
      $data['entry_product_name'] = $this->language->get('entry_product_name');

		$data['entry_pickup'] = $this->language->get('entry_pickup');
		$data['entry_packaging'] = $this->language->get('entry_packaging');
		$data['entry_classification'] = $this->language->get('entry_classification');
		$data['entry_origin'] = $this->language->get('entry_origin');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_state'] = $this->language->get('entry_state');
		$data['entry_country'] = $this->language->get('entry_country');
		$data['entry_zipcode'] = $this->language->get('entry_zipcode');
		$data['entry_street'] = $this->language->get('entry_street');
		$data['entry_mobile'] = $this->language->get('entry_housenumber');
		$data['entry_housenumber'] = $this->language->get('entry_mobile');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_quote_type'] = $this->language->get('entry_quote_type');
		$data['entry_service'] = $this->language->get('entry_service');
		$data['entry_insurance'] = $this->language->get('entry_insurance');
		$data['entry_display_weight'] = $this->language->get('entry_display_weight');
		$data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$data['entry_length_code'] = $this->language->get('entry_length_code');
		$data['entry_length_class'] = $this->language->get('entry_length_class');
		$data['entry_dimension'] = $this->language->get('entry_dimension');
		$data['entry_length'] = $this->language->get('entry_length');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');
		$data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_debug'] = $this->language->get('entry_debug');

		$data['help_key'] = $this->language->get('help_key');
		$data['help_channel_id'] = $this->language->get('help_channel_id');
		$data['help_retailer_id'] = $this->language->get('help_retailer_id');
      $data['help_shipping_price'] = $this->language->get('help_shipping_price');
      $data['help_product_name'] = $this->language->get('help_product_name');
		$data['help_pickup'] = $this->language->get('help_pickup');
		$data['help_packaging'] = $this->language->get('help_packaging');
		$data['help_classification'] = $this->language->get('help_classification');
		$data['help_origin'] = $this->language->get('help_origin');
		$data['help_city'] = $this->language->get('help_city');
		$data['help_state'] = $this->language->get('help_state');
		$data['help_street'] = $this->language->get('help_street');
		$data['help_housenumber'] = $this->language->get('help_housenumber');
		$data['help_zipcode'] = $this->language->get('help_zipcode');
      $data['help_mobile']    = $this->language->get('help_mobile');
      $data['help_email']  = $this->language->get('help_email');

		$data['help_country'] = $this->language->get('help_country');
		$data['help_zipcode'] = $this->language->get('help_zipcode');
		$data['help_test'] = $this->language->get('help_test');
		$data['help_quote_type'] = $this->language->get('help_quote_type');
		$data['help_service'] = $this->language->get('help_service');
		$data['help_insurance'] = $this->language->get('help_insurance');
		$data['help_display_weight'] = $this->language->get('help_display_weight');
		$data['help_weight_class'] = $this->language->get('help_weight_class');
		$data['help_length_class'] = $this->language->get('help_length_class');
		$data['help_dimension'] = $this->language->get('help_dimension');
		$data['help_debug'] = $this->language->get('help_debug');
		

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['key'])) {
			$data['error_key'] = $this->error['key'];
		} else {
			$data['error_key'] = '';
		}

		if (isset($this->error['channel_id'])) {
			$data['error_channel_id'] = $this->error['error_channel_id'];
		} else {
			$data['error_channel_id'] = '';
		}

		if (isset($this->error['retailer_id'])) {
			$data['error_retailer_id'] = $this->error['error_retailer_id'];
		} else {
			$data['error_retailer_id'] = '';
		}

		if (isset($this->error['city'])) {
			$data['error_city'] = $this->error['city'];
		} else {
			$data['error_city'] = '';
		}

		if (isset($this->error['zipcode'])) {
			$data['error_zipcode'] = $this->error['zipcode'];
		} else {
			$data['error_zipcode'] = '';
		}
		if (isset($this->error['housenumber'])) {
			$data['error_housenumber'] = $this->error['housenumber'];
		} else {
			$data['error_housenumber'] = '';
		}
      if (isset($this->error['mobile'])) {
			$data['error_mobile'] = $this->error['mobile'];
		} else {
			$data['error_mobile'] = '';
		}
      if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}
      if (isset($this->error['street'])) {
			$data['error_street'] = $this->error['street'];
		} else {
			$data['error_street'] = '';
		}
		if (isset($this->error['country'])) {
			$data['error_country'] = $this->error['country'];
		} else {
			$data['error_country'] = '';
		}

		if (isset($this->error['dimension'])) {
			$data['error_dimension'] = $this->error['dimension'];
		} else {
			$data['error_dimension'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_shipping'),
			'href' => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('shipping/local_express', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('shipping/local_express', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['local_express_key'])) {
			$data['local_express_key'] = $this->request->post['local_express_key'];
		} else {
			$data['local_express_key'] = $this->config->get('local_express_key');
		}

		if (isset($this->request->post['local_express_channel_id'])) {
			$data['local_express_channel_id'] = $this->request->post['local_express_channel_id'];
		} else {
			$data['local_express_channel_id'] = $this->config->get('local_express_channel_id');
		}

		if (isset($this->request->post['local_express_retailer_id'])) {
			$data['local_express_retailer_id'] = $this->request->post['local_express_retailer_id'];
		} else {
			$data['local_express_retailer_id'] = $this->config->get('local_express_retailer_id');
		}

		if (isset($this->request->post['local_express_pickup'])) {
			$data['local_express_pickup'] = $this->request->post['local_express_pickup'];
		} else {
			$data['local_express_pickup'] = $this->config->get('local_express_pickup');
		}

		$data['pickups'] = array();

		$data['pickups'][] = array(
			'value' => '01',
			'text'  => $this->language->get('text_daily_pickup')
		);

		$data['pickups'][] = array(
			'value' => '03',
			'text'  => $this->language->get('text_customer_counter')
		);

		$data['pickups'][] = array(
			'value' => '06',
			'text'  => $this->language->get('text_one_time_pickup')
		);

		$data['pickups'][] = array(
			'value' => '07',
			'text'  => $this->language->get('text_on_call_air_pickup')
		);

		$data['pickups'][] = array(
			'value' => '19',
			'text'  => $this->language->get('text_letter_center')
		);

		$data['pickups'][] = array(
			'value' => '20',
			'text'  => $this->language->get('text_air_service_center')
		);

		$data['pickups'][] = array(
			'value' => '11',
			'text'  => $this->language->get('text_suggested_retail_rates')
		);

		if (isset($this->request->post['local_express_packaging'])) {
			$data['local_express_packaging'] = $this->request->post['local_express_packaging'];
		} else {
			$data['local_express_packaging'] = $this->config->get('local_express_packaging');
		}
		if (isset($this->request->post['local_express_origin'])) {
			$data['local_express_origin'] = $this->request->post['local_express_origin'];
		} else {
			$data['local_express_origin'] = $this->config->get('local_express_origin');
		}

		$data['origins'] = array();

		$data['origins'][] = array(
			'value' => 'US',
			'text'  => $this->language->get('text_us')
		);

		$data['origins'][] = array(
			'value' => 'CA',
			'text'  => $this->language->get('text_ca')
		);

		$data['origins'][] = array(
			'value' => 'EU',
			'text'  => $this->language->get('text_eu')
		);

		$data['origins'][] = array(
			'value' => 'PR',
			'text'  => $this->language->get('text_pr')
		);

		$data['origins'][] = array(
			'value' => 'MX',
			'text'  => $this->language->get('text_mx')
		);

		$data['origins'][] = array(
			'value' => 'other',
			'text'  => $this->language->get('text_other')
		);

		if (isset($this->request->post['local_express_city'])) {
			$data['local_express_city'] = $this->request->post['local_express_city'];
		} else {
			$data['local_express_city'] = $this->config->get('local_express_city');
		}

		if (isset($this->request->post['local_express_state'])) {
			$data['local_express_state'] = $this->request->post['local_express_state'];
		} else {
			$data['local_express_state'] = $this->config->get('local_express_state');
		}

		if (isset($this->request->post['local_express_country'])) {
			$data['local_express_country'] = $this->request->post['local_express_country'];
		} else {
			$data['local_express_country'] = $this->config->get('local_express_country');
		}

		if (isset($this->request->post['local_express_zipcode'])) {
			$data['local_express_zipcode']  = $this->request->post['local_express_zipcode'];
			$data['local_express_latitude']  = $this->request->post['local_express_latitude'];
			$data['local_express_longitude'] = $this->request->post['local_express_longitude'];
		} else {
			$data['local_express_zipcode']  = $this->config->get('local_express_zipcode');
			$data['local_express_latitude']  = $this->config->get('local_express_latitude');
			$data['local_express_longitude'] = $this->config->get('local_express_longitude');
		}

		if (isset($this->request->post['local_express_test'])) {
			$data['local_express_test'] = $this->request->post['local_express_test'];
		} else {
			$data['local_express_test'] = $this->config->get('local_express_test');
		}

		if (isset($this->request->post['local_express_quote_type'])) {
			$data['local_express_quote_type'] = $this->request->post['local_express_quote_type'];
		} else {
			$data['local_express_quote_type'] = $this->config->get('local_express_quote_type');
		}
		if (isset($this->request->post['local_express_shipping_price'])){
         $data['local_express_shipping_price'] = floatval($this->request->post('local_express_shipping_price'));
      } else {
			$data['local_express_shipping_price'] = $this->config->get('local_express_shipping_price');
		}  
		if (isset($this->request->post['local_express_quote_type'])) {
         $data['local_express_product_name'] = $this->request->post('local_express_product_name');    
      } else {
			$data['local_express_product_name'] = $this->config->get('local_express_product_name');
		}  

		$data['quote_types'] = array();

		$data['quote_types'][] = array(
			'value' => 'residential',
			'text'  => $this->language->get('text_residential')
		);

		$data['quote_types'][] = array(
			'value' => 'commercial',
			'text'  => $this->language->get('text_commercial')
		);

		if (isset($this->request->post['local_express_zipcode'])) {
			$data['local_express_zipcode'] = $this->request->post['local_express_zipcode'];
		} else {
			$data['local_express_zipcode'] = $this->config->get('local_express_zipcode');
		}

		if (isset($this->request->post['local_express_street'])) {
			$data['local_express_street'] = $this->request->post['local_express_street'];
		} else {
			$data['local_express_street'] = $this->config->get('local_express_street');
		}

		if (isset($this->request->post['local_express_housenumber'])) {
			$data['local_express_housenumber'] = $this->request->post['local_express_housenumber'];
		} else {
			$data['local_express_housenumber'] = $this->config->get('local_express_housenumber');
		}
		if (isset($this->request->post['local_express_email'])) {
			$data['local_express_email'] = $this->request->post['local_express_email'];
		} else {
			$data['local_express_email'] = $this->config->get('local_express_email');
		}
		if (isset($this->request->post['local_express_mobile'])) {
			$data['local_express_mobile'] = $this->request->post['local_express_mobile'];
		} else {
			$data['local_express_mobile'] = $this->config->get('local_express_mobile');
		}
		if (isset($this->request->post['local_express_display_weight'])) {
			$data['local_express_display_weight'] = $this->request->post['local_express_display_weight'];
		} else {
			$data['local_express_display_weight'] = $this->config->get('local_express_display_weight');
		}

		if (isset($this->request->post['local_express_insurance'])) {
			$data['local_express_insurance'] = $this->request->post['local_express_insurance'];
		} else {
			$data['local_express_insurance'] = $this->config->get('local_express_insurance');
		}

		if (isset($this->request->post['local_express_weight_class_id'])) {
			$data['local_express_weight_class_id'] = $this->request->post['local_express_weight_class_id'];
		} else {
			$data['local_express_weight_class_id'] = $this->config->get('local_express_weight_class_id');
		}

		$this->load->model('localisation/weight_class');

		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		if (isset($this->request->post['local_express_length_code'])) {
			$data['local_express_length_code'] = $this->request->post['local_express_length_code'];
		} else {
			$data['local_express_length_code'] = $this->config->get('local_express_length_code');
		}

		if (isset($this->request->post['local_express_length_class_id'])) {
			$data['local_express_length_class_id'] = $this->request->post['local_express_length_class_id'];
		} else {
			$data['local_express_length_class_id'] = $this->config->get('local_express_length_class_id');
		}

		$this->load->model('localisation/length_class');

		$data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

		if (isset($this->request->post['local_express_length'])) {
			$data['local_express_length'] = $this->request->post['local_express_length'];
		} else {
			$data['local_express_length'] = $this->config->get('local_express_length');
		}

		if (isset($this->request->post['local_express_width'])) {
			$data['local_express_width'] = $this->request->post['local_express_width'];
		} else {
			$data['local_express_width'] = $this->config->get('local_express_width');
		}

		if (isset($this->request->post['local_express_height'])) {
			$data['local_express_height'] = $this->request->post['local_express_height'];
		} else {
			$data['local_express_height'] = $this->config->get('local_express_height');
		}

		if (isset($this->request->post['local_express_tax_class_id'])) {
			$data['local_express_tax_class_id'] = $this->request->post['local_express_tax_class_id'];
		} else {
			$data['local_express_tax_class_id'] = $this->config->get('local_express_tax_class_id');
		}

		$this->load->model('localisation/tax_class');

		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post['local_express_geo_zone_id'])) {
			$data['local_express_geo_zone_id'] = $this->request->post['local_express_geo_zone_id'];
		} else {
			$data['local_express_geo_zone_id'] = $this->config->get('local_express_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['local_express_status'])) {
			$data['local_express_status'] = $this->request->post['local_express_status'];
		} else {
			$data['local_express_status'] = $this->config->get('local_express_status');
		}

		if (isset($this->request->post['local_express_sort_order'])) {
			$data['local_express_sort_order'] = $this->request->post['local_express_sort_order'];
		} else {
			$data['local_express_sort_order'] = $this->config->get('local_express_sort_order');
		}

		if (isset($this->request->post['local_express_debug'])) {
			$data['local_express_debug'] = $this->request->post['local_express_debug'];
		} else {
			$data['local_express_debug'] = $this->config->get('local_express_debug');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('shipping/local_express.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'shipping/local_express')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['local_express_key']) {
			$this->error['key'] = $this->language->get('error_key');
		}

		if (!$this->request->post['local_express_retailer_id']) {
			$this->error['retailer_id'] = $this->language->get('error_retailer_id');
		}

		if (!$this->request->post['local_express_channel_id']) {
			$this->error['channel_id'] = $this->language->get('error_channel_id');
		}

		if (!$this->request->post['local_express_city']) {
			$this->error['city'] = $this->language->get('error_city');
		}

		if (!$this->request->post['local_express_zipcode']) {
			$this->error['zipcode'] = $this->language->get('error_zipcode');
		}
		if (!$this->request->post['local_express_housenumber']) {
			$this->error['housenumber'] = $this->language->get('error_housenumber');
		}
		if (!$this->request->post['local_express_email']) {
			$this->error['email'] = $this->language->get('error_email');
		}
		if (!$this->request->post['local_express_mobile']) {
			$this->error['mobile'] = $this->language->get('error_mobile');
		}
		if (!$this->request->post['local_express_street']) {
			$this->error['street'] = $this->language->get('error_street');
		}

		if (!$this->request->post['local_express_country']) {
			$this->error['country'] = $this->language->get('error_country');
		}

		if (empty($this->request->post['local_express_length'])) {
			$this->error['dimension'] = $this->language->get('error_dimension');
		}

		if (empty($this->request->post['local_express_width'])) {
			$this->error['dimension'] = $this->language->get('error_dimension');
		}

		if (empty($this->request->post['local_express_height'])) {
			$this->error['dimension'] = $this->language->get('error_dimension');
		}

		return !$this->error;
	}
}