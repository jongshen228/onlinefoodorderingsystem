<script>
$('selector_that_will_change_qnt').click() {
.ajax ({
url: 'updatequantity.php',
type: 'post',
dataType: 'html',
success: function() { // code here if success request},
error: function(){ //code here if request was failed}
});
}
</script>