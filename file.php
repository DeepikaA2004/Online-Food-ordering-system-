<?php endwhile; ?>
</div>
<div class="col-md-4">
<div class="sticky">
<div class="card">
<div class="card-body">
<p><large>Total Amount</large></p>
<hr>
<p class="text-right"><b><?php echo number_format($total,2) ?></b></p>
<hr>
<div class="text-center">
<button class="btn btn-block btn-outline-primary" type="button" id="checkout">Proceed to Checkout</button>
</div>
</div>
</div>
</div>
</section>
<style>
.card p {
margin: unset
}
.card img{
max-width: calc(100%);
max-height: calc(59%);
}
div.sticky {
position: -webkit-sticky; /* Safari */
position: sticky;
top: 4.7em;
z-index: 10;
background: white
}
.rem_cart{
position: absolute;
left: 0;
}
</style>
<script>
$('.view_prod').click(function(){
uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
})
$('.qty-minus').click(function(){
var qty = $(this).parent().siblings('input[name="qty"]').val();
update_qty(parseInt(qty) -1,$(this).attr('data-id'))
if(qty == 1){
return false;
}else{
$(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
}
$('.qty-plus').click(function(){
var qty = $(this).parent().siblings('input[name="qty"]').val();
$(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
update_qty(parseInt(qty) +1,$(this).attr('data-id'))
})
function update_qty(qty,id){
start_load()
$.ajax({
url:'admin/ajax.php?action=update_cart_qty',
method:"POST",
data:{id:id,qty},
success:function(resp){
if(resp == 1){
load_cart()
end_load()
}
})
}
$('#checkout').click(function(){
if('<?php echo isset($_SESSION['login_user_id']) ?>' == 1){
location.replace("index.php?page=checkout")
}else{
uni_modal("Checkout","login.php?page=checkout") }
}) 
</php>