jQuery(document).ready(function($) {
  /* Add to cart buttons */
  $("form#settings-form table, table.profile-fields").addClass("table table-striped");  
  $("input[type='submit']").addClass("btn btn-success");  
  $("#item-header-avatar img,.activity-avatar img").addClass("thumbnail");
  $(".bp-primary-action,.bp-secondary-action").addClass("btn btn-mini");
  $(".item-button.delete-activity").addClass("btn-danger"); 
});
