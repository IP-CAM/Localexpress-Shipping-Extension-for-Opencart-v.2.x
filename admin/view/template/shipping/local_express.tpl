<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-local_express" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-local_express" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-key"><span data-toggle="tooltip" title="<?php echo $help_key; ?>"><?php echo $entry_key; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_key" value="<?php echo $local_express_key; ?>" placeholder="<?php echo $entry_key; ?>" id="input-key" class="form-control" />
              <?php if ($error_key) { ?>
              <div class="text-danger"><?php echo $error_key; ?></div>
              <?php } ?>
            </div>
          </div>

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-channel-id"><span data-toggle="tooltip" title="<?php echo $help_channel_id; ?>"><?php echo $entry_channel_id; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_channel_id" value="<?php echo $local_express_channel_id; ?>" placeholder="<?php echo $entry_channel_id; ?>" id="input-channel-id" class="form-control" />
              <?php if ($error_channel_id) { ?>
              <div class="text-danger"><?php echo $error_channel_id; ?></div>
              <?php } ?>
            </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-retailer-id"><span data-toggle="tooltip" title="<?php echo $help_retailer_id; ?>"><?php echo $entry_retailer_id; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_retailer_id" value="<?php echo $local_express_retailer_id; ?>" placeholder="<?php echo $entry_retailer_id; ?>" id="input-retailer-id" class="form-control" />
              <?php if ($error_retailer_id) { ?>
              <div class="text-danger"><?php echo $error_retailer_id; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-product-name"><span data-toggle="tooltip" title="<?php echo $help_product_name; ?>"><?php echo $entry_product_name; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_product_name" value="<?php echo $local_express_product_name; ?>" placeholder="<?php echo $entry_product_name; ?>" id="input-product-name" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-shipping-price"><span data-toggle="tooltip" title="<?php echo $help_shipping_price; ?>"><?php echo $entry_shipping_price; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_shipping_price" value="<?php echo $local_express_shipping_price; ?>" placeholder="<?php echo $entry_shipping_price; ?>" id="input-shipping-price" class="form-control" />
            </div>
          </div>

<!--          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pickup"><span data-toggle="tooltip" title="<?php echo $help_pickup; ?>"><?php echo $entry_pickup; ?></span></label>
            <div class="col-sm-10">
              <select name="local_express_pickup" id="input-pickup" class="form-control">
                <?php foreach ($pickups as $pickup) { ?>
                <?php if ($pickup['value'] == $local_express_pickup) { ?>
                <option value="<?php echo $pickup['value']; ?>" selected="selected"><?php echo $pickup['text']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $pickup['value']; ?>"><?php echo $pickup['text']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>-->

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-city"><span data-toggle="tooltip" title="<?php echo $help_city; ?>"><?php echo $entry_city; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_city" value="<?php echo $local_express_city; ?>" placeholder="<?php echo $entry_city; ?>" id="input-city" class="form-control" />
              <?php if ($error_city) { ?>
              <div class="text-danger"><?php echo $error_city; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-state"><span data-toggle="tooltip" title="<?php echo $help_state; ?>"><?php echo $entry_state; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_state" value="<?php echo $local_express_state; ?>" placeholder="<?php echo $entry_state; ?>" id="input-state" class="form-control" maxlength="2" />
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-country"><span data-toggle="tooltip" title="<?php echo $help_country; ?>"><?php echo $entry_country; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_country" value="<?php echo $local_express_country; ?>" placeholder="<?php echo $entry_country; ?>" id="input-country" class="form-control" maxlength="2" />
              <?php if ($error_country) { ?>
              <div class="text-danger"><?php echo $error_country; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-zipcode"><span data-toggle="tooltip" title="<?php echo $help_zipcode; ?>"><?php echo $entry_zipcode; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_zipcode" value="<?php echo $local_express_zipcode; ?>" placeholder="<?php echo $entry_zipcode; ?>" id="input-zipcode" class="form-control" />
              <?php if ($error_zipcode) { ?>
              <div class="text-danger"><?php echo $error_zipcode; ?></div>
              <?php } ?>
            </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-street"><span data-toggle="tooltip" title="<?php echo $help_street; ?>"><?php echo $entry_street; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_street" value="<?php echo $local_express_street; ?>" placeholder="<?php echo $entry_street; ?>" id="input-street" class="form-control" />
              <?php if ($error_street) { ?>
              <div class="text-danger"><?php echo $error_street; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-housenumber"><span data-toggle="tooltip" title="<?php echo $help_housenumber; ?>">Housenumber</span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_housenumber" value="<?php echo $local_express_housenumber; ?>" placeholder="<?php echo $entry_housenumber; ?>" id="input-housenumber" class="form-control" />
              <?php if ($error_housenumber) { ?>
              <div class="text-danger"><?php echo $error_housenumber; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email"><span data-toggle="tooltip" title="<?php echo $help_email; ?>"><?php echo $entry_email; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_email" value="<?php echo $local_express_email; ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control" />
              <?php if ($error_email) { ?>
              <div class="text-danger"><?php echo $error_email; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-mobile"><span data-toggle="tooltip" title="<?php echo $help_mobile; ?>">Mobile</span></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_mobile" value="<?php echo $local_express_mobile; ?>" placeholder="<?php echo $entry_mobile; ?>" id="input-mobile" class="form-control" />
              <?php if ($error_mobile) { ?>
              <div class="text-danger"><?php echo $error_mobile; ?></div>
              <?php } ?>
            </div>
          </div>
        
         <input type="hidden" name="local_express_longitude" value="<?php echo $local_express_longitude; ?>" />
         <input type="hidden" name="local_express_latitude" value="<?php echo $local_express_latitude; ?>" />
          <div class="form-group">
            <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_test; ?>"><?php echo $entry_test; ?></span></label>
            <div class="col-sm-10">
              <label class="radio-inline">
                <?php if ($local_express_test) { ?>
                <input type="radio" name="local_express_test" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <?php } else { ?>
                <input type="radio" name="local_express_test" value="1" />
                <?php echo $text_yes; ?>
                <?php } ?>
              </label>
              <label class="radio-inline">
                <?php if (!$local_express_test) { ?>
                <input type="radio" name="local_express_test" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="local_express_test" value="0" />
                <?php echo $text_no; ?>
                <?php } ?>
              </label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_insurance; ?>"><?php echo $entry_insurance; ?></span></label>
            <div class="col-sm-10">
              <label class="radio-inline">
                <?php if ($local_express_insurance) { ?>
                <input type="radio" name="local_express_insurance" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <?php } else { ?>
                <input type="radio" name="local_express_insurance" value="1" />
                <?php echo $text_yes; ?>
                <?php } ?>
              </label>
              <label class="radio-inline">
                <?php if (!$local_express_insurance) { ?>
                <input type="radio" name="local_express_insurance" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="local_express_insurance" value="0" />
                <?php echo $text_no; ?>
                <?php } ?>
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_display_weight; ?></label>
            <div class="col-sm-10">
              <label class="radio-inline">
                <?php if ($local_express_display_weight) { ?>
                <input type="radio" name="local_express_display_weight" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <?php } else { ?>
                <input type="radio" name="local_express_display_weight" value="1" />
                <?php echo $text_yes; ?>
                <?php } ?>
              </label>
              <label class="radio-inline">
                <?php if (!$local_express_display_weight) { ?>
                <input type="radio" name="local_express_display_weight" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="local_express_display_weight" value="0" />
                <?php echo $text_no; ?>
                <?php } ?>
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-weight-class"><span data-toggle="tooltip" title="<?php echo $help_weight_class; ?>"><?php echo $entry_weight_class; ?></span></label>
            <div class="col-sm-10">
              <select name="local_express_weight_class_id" id="input-weight-class" class="form-control">
                <?php foreach ($weight_classes as $weight_class) { ?>
                <?php if ($weight_class['weight_class_id'] == $local_express_weight_class_id) { ?>
                <option value="<?php echo $weight_class['weight_class_id']; ?>" selected="selected"><?php echo $weight_class['title']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $weight_class['weight_class_id']; ?>"><?php echo $weight_class['title']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-length-class"><span data-toggle="tooltip" title="<?php echo $help_length_class; ?>"><?php echo $entry_length_class; ?></span></label>
            <div class="col-sm-10">
              <select name="local_express_length_class_id" id="input-length-class" class="form-control">
                <?php foreach ($length_classes as $length_class) { ?>
                <?php if ($length_class['length_class_id'] == $local_express_length_class_id) { ?>
                <option value="<?php echo $length_class['length_class_id']; ?>" selected="selected"><?php echo $length_class['title']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $length_class['length_class_id']; ?>"><?php echo $length_class['title']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-length"><span data-toggle="tooltip" title="<?php echo $help_dimension; ?>"><?php echo $entry_dimension; ?></span></label>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-4">
                  <input type="text" name="local_express_length" value="<?php echo $local_express_length; ?>" placeholder="<?php echo $entry_length; ?>" id="input-length" class="form-control" />
                </div>
                <div class="col-sm-4">
                  <input type="text" name="local_express_width" value="<?php echo $local_express_width; ?>" placeholder="<?php echo $entry_width; ?>" id="input-width" class="form-control" />
                </div>
                <div class="col-sm-4">
                  <input type="text" name="local_express_height" value="<?php echo $local_express_height; ?>" placeholder="<?php echo $entry_height; ?>" id="input-height" class="form-control" />
                </div>
              </div>
              <?php if ($error_dimension) { ?>
              <div class="text-danger"><?php echo $error_dimension; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="local_express_sort_order" value="<?php echo $local_express_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="local_express_status" id="input-status" class="form-control">
                <?php if ($local_express_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-debug"><span data-toggle="tooltip" title="<?php echo $help_debug; ?>"><?php echo $entry_debug; ?></span></label>
            <div class="col-sm-10">
              <select name="local_express_debug" id="input-debug" class="form-control">
                <?php if ($local_express_debug) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
$('select[name=\'local_express_origin\']').on('change', function() {
	$('#service > div').hide();	
										 
	$('#' + this.value).show();	
});

$('select[name=\'local_express_origin\']').trigger('change');
//--></script></div>
<?php echo $footer; ?>