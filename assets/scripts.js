jQuery(document).ready(function ($) {
  $("#telelog_enable").click(function (e) {
    e.preventDefault();
    $("#telelog_form input[type=checkbox]").prop("checked", true);
  });
  $("#telelog_disable").click(function (e) {
    e.preventDefault();
    $("#telelog_form input[type=checkbox]").prop("checked", false);
  });
});
