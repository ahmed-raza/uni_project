$(document).ready(function() {
  $('select').select2({
      theme: "bootstrap"
  });
  $('#ads-days, #users-days').select2({
      theme: "bootstrap",
      minimumResultsForSearch: -1
  });
  $(".ad-group").colorbox({
      rel:'ad-group',
      transition:"fade",
      width: "75%",
      height: "75%",
  });
  $('a#edit').on('click', function(e){
    var id = e.target.getAttribute('data-id');
    var name = e.target.getAttribute('data-name');
    $('form#category-edit').find('input#category-name').val(name);
    var action = $('form#category-edit').attr('action').split('/');
    action = action[0] +"/"+ action[1] +"/"+ action[2] +"/"+ action[3] +"/"+ id;
    $('form#category-edit').attr('action', action).val(name);
  });
  $('form select').on('change', function(e){
    var entity = $(e.target).parents('form').find('#entity').val();
    var token = $(e.target).parents('form').find('input[name="_token"]').val();
    var days = $(e.target).val();
    $.ajax({
      url: '/api/dashboard/data',
      type: 'POST',
      data: {_token: token, entity: entity, days: days},
      success: function(data) {
        $(e.target).parents('fieldset').find('.results').html(data);
      }
    });
  });
  if($('input#pull_contact_info').is(':checked')) {
    $('.custom-contact-info').hide();
  }
  $('input#pull_contact_info').change(function(){
    $('.custom-contact-info').show();
    if(this.checked) {
      $('.custom-contact-info').hide();
    }
  });
  $('a#remove-image').each(function() {
    $(this).click(function(e) {
      $(this).parents('.col-lg-4').find('input#removed-images').val($(this).attr('data-image-name'));
      $(this).parents('.col-lg-4').find('.uploaded-image').remove();
    });
  });
  $(function() {
    $('.pagination a').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getAds(url);
        window.history.pushState("", "", url);
    });
    function getAds(url) {
        $.ajax({
            url : url
        }).done(function (data) {
          $('.ads').attr('id', 'results');
          $('#results').html(data);
        }).fail(function () {
            alert('Ads could not be loaded.');
        });
    }
  });
  $('input[type="range"]').on('input',function(e){
    $(this).parents('.price-range').find('#price-val').html($(e.target).val());
  });
  $('.ads-index #ads-search').submit(function(e){
    e.preventDefault();
    $('#loader').show();
    var action = $(this).attr('action');
    var title = $(this).find('#title').val();
    var category_id = $(this).find('#category_id').val();
    var city = $(this).find('#city').val();
    var min_price = $(this).find('#price-min').val();
    var max_price = $(this).find('#price-max').val();
    var _token = $(this).find('input[name="_token"]').val();
    $.ajax({
      type: 'GET',
      url: action,
      data: {
        _token: _token,
        title: title,
        category_id: category_id,
        city : city,
        min_price : min_price,
        max_price : max_price,
      },
      success: function(data){
        setTimeout(function(){
          $('.ads').html(data);
          $('#loader').hide();
        }, 2000);
      }
    });
  });
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
