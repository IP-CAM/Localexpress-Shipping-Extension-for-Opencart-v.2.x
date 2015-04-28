<?php
class ModelShippingLocalExpress extends Model {
//   function writeLog($value){
//      $file    = 'local_express.txt';
//      $current = file_get_contents($file);
//      $current .= $value."\n";
//      file_put_contents($file, $current);
//   }
   function sentJSON($url,$post=false,$debug=false){
      $ch         = curl_init($url);     
//      if($this->config->get('local_express_debug')=='1'){
//         $this->writeLog("\n\n\nsentJSON ".$url);
//         $this->writeLog("post ".$post);
//      }

      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

      if($post){
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      }
//      if($this->config->get('local_express_debug')=='1'){
//         curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
//      }
      $result = curl_exec($ch);
      $info = curl_getinfo($ch);
//      if($this->config->get('local_express_debug')=='1'){
//         $this->writeLog("info ".json_encode($info));
//         $this->writeLog("result ".$result);
//         $this->writeLog("header ".curl_getinfo($ch, CURLINFO_HEADER_OUT ));
//      }
      curl_close($ch);
      return array("info" => $info,"result" => $result);
   }
   function sentBOXJson($url,$key,$post=false){
      $ch         = curl_init($url);
//      if($this->config->get('local_express_debug')=='1'){
//         $this->writeLog("\n\n\nsentBOXJson ".$url);
//         $this->writeLog("post ".$post);
//         curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//      }
      if($post){
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      }
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
      curl_setopt($ch, CURLOPT_HTTPHEADER,array(
             'Content-Type: application/json',
             'Accept-Language: en',
             'Connection: Keep-Alive',
             'Authorization: Boxture '.$key));
      $result = curl_exec($ch);
      $info = curl_getinfo($ch);
//      if($this->config->get('local_express_debug')=='1'){
//         $this->writeLog("result ".$result);
//         $this->writeLog("info ".json_encode($info));
//         $this->writeLog("header ".curl_getinfo($ch, CURLINFO_HEADER_OUT ));
//      }
      curl_close($ch);
      return array("info" => $info,"result" => $result);
   }

	function getQuote($address) {

	   $error = false;
		$country = array(
			'AF' => 'Afghanistan',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia-Herzegovina',
			'BW' => 'Botswana',
			'BR' => 'Brazil',
			'VG' => 'British Virgin Islands',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'MM' => 'Burma',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island (Australia)',
			'CC' => 'Cocos Island (Australia)',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CG' => 'Congo (Brazzaville),Republic of the',
			'ZR' => 'Congo, Democratic Republic of the',
			'CK' => 'Cook Islands (New Zealand)',
			'CR' => 'Costa Rica',
			'CI' => 'Cote d\'Ivoire (Ivory Coast)',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'TP' => 'East Timor (Indonesia)',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia, Republic of',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GB' => 'Great Britain and Northern Ireland',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GT' => 'Guatemala',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => 'Laos',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macedonia, Republic of',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte (France)',
			'MX' => 'Mexico',
			'MD' => 'Moldova',
			'MC' => 'Monaco (France)',
			'MN' => 'Mongolia',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'AN' => 'Netherlands Antilles',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'KP' => 'North Korea (Korea, Democratic People\'s Republic of)',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn Island',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'QA' => 'Qatar',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russia',
			'RW' => 'Rwanda',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts (St. Christopher and Nevis)',
			'LC' => 'Saint Lucia',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'YU' => 'Serbia-Montenegro',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovak Republic',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia (Falkland Islands)',
			'KR' => 'South Korea (Korea, Republic of)',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syrian Arab Republic',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TG' => 'Togo',
			'TK' => 'Tokelau (Union) Group (Western Samoa)',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VA' => 'Vatican City',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WF' => 'Wallis and Futuna Islands',
			'WS' => 'Western Samoa',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe'
		);

		$this->load->language('shipping/local_express');
//      if($this->config->get('local_express_debug')=='1'){
//         $this->writeLog("\n\n\nnew request ".json_encode($address));
//         $this->writeLog("\nPost ".json_encode($_POST));
//      }
      
//      $nom           = $this->sentJSON("http://nominatim.openstreetmap.org/search.php?postalcode=".str_replace(" ","",$address['postcode'])."&country=".$country[$address['iso_code_2']]."&format=json&addressdetails=1");
//      $jsonNom       = json_decode($nom['result'],true);
      if(empty($address['postcode']))
         $address['postcode'] = $_POST['postcode'];

      $api_boxture   = $this->sentJSON("https://api.boxture.com/convert_address.php",json_encode(array("postal_code" => $address['postcode'],"address"=> $address['address_1'],"iso_country_code"=> $address['iso_code_2'])));
      
      $json_boxture  = json_decode($api_boxture['result'],true);
      
      if(!empty($json_boxture['lat'])){
         $return     = $this->sentBOXJSON("https://api".($this->config->get('local_express_test') ? "-qa" : "-new").".boxture.com/available_features?retailer_id=".$this->config->get('local_express_retailer_id')."&latitude=".$json_boxture['lat']."&purpose=pickup&longitude=".$json_boxture['lon'],$this->config->get('local_express_key'));
         $jsonAPI    = json_decode($return['result'],true);
         $longitude  = $json_boxture['lon'];
         $latitude   = $json_boxture['lat']; 
         $status = (($return['info']['http_code']=='404' || $return['info']['http_code']=='422') ? false : true);
      } else {
         $status = false;
      }
		$method_data = array();

		if ($status) {
			$weight = $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), $this->config->get('local_express_weight_class_id'));
			$weight_code = strtoupper($this->weight->getUnit($this->config->get('local_express_weight_class_id')));

			if ($weight_code == 'KG') {
				$weight_code = 'KGS';
			} elseif ($weight_code == 'LB') {
				$weight_code = 'LBS';
			}

			$weight = ($weight < 0.1 ? 0.1 : $weight);

			$length = $this->length->convert($this->config->get('local_express_length'), $this->config->get('config_length_class_id'), $this->config->get('local_express_length_class_id'));
			$width = $this->length->convert($this->config->get('local_express_width'), $this->config->get('config_length_class_id'), $this->config->get('local_express_length_class_id'));
			$height = $this->length->convert($this->config->get('local_express_height'), $this->config->get('config_length_class_id'), $this->config->get('local_express_length_class_id'));

			$length_code = strtoupper($this->length->getUnit($this->config->get('local_express_length_class_id')));
         $json = array(
            "service_type" => "",
            "human_id" => null,
            "state" => null,
            "weight" => $weight,
            "value" => $this->currency->format($this->cart->getSubTotal(), false, false, false),
            "quantity" => 1,
            "insurance" => $this->config->get('local_express_insurance'),
            "dimensions" => array("width" => $width,"height" => $height,"length" => $length),
            "comments" => "",
            "customer_email" => "",
            "origin" =>  array(
               "country" => $country[ucwords($this->config->get('local_express_country'))],
               "formatted_address" => $this->config->get('local_express_street')." ". $this->config->get('local_express_housenumber')."\n".$this->config->get('local_express_zipcode')." ".$this->config->get('local_express_city')."\n".$country[$this->config->get('local_express_country')],
               "administrative_area" => $this->config->get('local_express_state'),
               "iso_country_code" => $this->config->get('local_express_country'),
               "locality" => $this->config->get('local_express_city'),
               "postal_code" => $this->config->get('local_express_zipcode'),
               "sub_thoroughfare" => $this->config->get('local_express_housenumber'),
               "thoroughfare" => $this->config->get('local_express_street'),
               "contact" => "",
               "email" => $this->config->get('local_express_email'),
               "mobile" => $this->config->get('local_express_mobile'),
               "comments" => "",
               "company" => "",
            ),
            "destination" => array(
               "country" => $country[$address['iso_code_2']],
               "formatted_address" => $address['address_1'] ."\n".$address['postcode']." ".$address['city']."\n".$country[$address['iso_code_2']],
               "iso_country_code" => $address['iso_code_2'],
               "locality" => $address['city'],
               "postal_code" => $address['postcode'],
               "sub_thoroughfare" => $json_boxture['subThoroughfare'],
               "thoroughfare" => $json_boxture['thoroughfare'],
               "contact" => $address['firstname'] . ' ' . $address['lastname'],
               "email" => (!empty($this->customer->getEmail()) ? $this->customer->getEmail() : $this->session->data['guest']['email'] ),
               "mobile" => $this->customer->getTelephone(),
               "comments" => "",
               "company" => $address['company']
            ),
            "waybill_nr" => null,
            "vehicle_type" => "bicycle"
         );
         $json = json_encode(array("shipment_quote" => $json));
         
         $api_local_express_q    = $this->sentBOXJSON("https://api".($this->config->get('local_express_test') ? "-qa" : "-new").".boxture.com/shipment_quotes",$this->config->get('local_express_key'),$json);
         $json_local_express_q   = json_decode($api_local_express_q['result'],true);

			$quote_data = array();
         $code = "SD";
			if ($json_local_express_q) {
//				if ($this->config->get('local_express_debug')) {
//					$this->log->write("LOCAL EXPRESS DATA SENT: " . $json);
//					$this->log->write("LOCAL EXPRESS DATA RECV: " . $api_local_express_q['result']);
//				}
            if($api_local_express_q['info']['http_code'] >= 400){
//   			   echo $json;
//   			   echo "<pre>";
//               print_r($api_local_express_q);
//               echo "</pre>";
   			} else {
   				if ($json_local_express_q['shipment_quote']['price']) {
                  $title   = $this->config->get('local_express_product_name');
                  $lesh    = $this->config->get('local_express_shipping_price');
                  $price   = (empty( $lesh ) ? $json_local_express_q['shipment_quote']['price'] :  $lesh);
   					$quote_data[$code] = array(
   						'code'         => 'boxture.'.$code,
   						'title'        => (empty($title) ? "Same Day" : $title),
   						'cost'         => $this->currency->convert($price, $json_local_express_q['shipment_quote']['currency'], $this->config->get('config_currency')),
   						'tax_class_id' => $this->config->get('local_express_tax_class_id'),
   						'text'         => $this->currency->format($this->tax->calculate($this->currency->convert($price, $json_local_express_q['shipment_quote']['currency'], $this->currency->getCode()), $this->config->get('local_express_tax_class_id'), $this->config->get('config_tax')), $this->currency->getCode(), 1.0000000)//$this->currency->convert($json_local_express_q['shipment_quote']['price'], $json_local_express_q['shipment_quote']['currency'], $this->config->get('config_currency'))
   					);
   				}
   			}
			}

			$title = $this->language->get('text_title');

			if ($this->config->get('local_express_display_weight')) {
				$title .= ' (' . $this->language->get('text_weight') . ' ' . $this->weight->format($weight, $this->config->get('local_express_weight_class_id')) . ')';
			}

			if ($quote_data || $error) {
				$method_data = array(
					'code'       => 'boxture',
					'title'      => $title,
					'quote'      => $quote_data,
					'sort_order' => $this->config->get('local_express_sort_order'),
					'error'      => $error
				);
			}
		}

		return $method_data;
	}
}