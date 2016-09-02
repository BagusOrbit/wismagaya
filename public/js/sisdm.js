$(function () {
    //$('select').chosen({
    //    no_results_text: "Oops, data tidak ditemukan!",
    //    disable_search_threshold: 10,
    //    search_contains: true,
    //    //placeholder_text_single: placeholdersingle,
    //    //placeholder_text_multiple: placeholder,
    //    allow_single_deselect: true
    //});
    $('select').select2();
    $('.datepicker').datepicker({language: 'id',format: 'yyyy-mm-dd'}).on("changeDate", function () { $(this).datepicker('hide'); });
});