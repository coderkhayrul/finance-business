<script>
$(document).ready(function (e) {
    $(document).on("click", ".delete-modal", function (e) {
        var delete_id = $(this).attr('data-value');
        $('button[name="delete_user"]').val(delete_id);
    });
});
</script>
