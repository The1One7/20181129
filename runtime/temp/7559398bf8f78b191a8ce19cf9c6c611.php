<?php /*a:1:{s:48:"addons/distribut/view/home/shops/goods_edit.html";i:1536627275;}*/ ?>
<?php if($distributType==1): ?>
<tr>
     <th>是否分销商品<font color='red'>*</font>：</th>
     <td colspan='2'>
      <div class="radio-box">
        <label><input type='radio' name='isDistribut' id="isDistribut-1" class='j-ipt wst-radio' value='1' <?php if($distObj['isDistribut']==1): ?>checked<?php endif; ?>/><label for="isDistribut-1" class="mt-1"></label>是</label>
        <label><input type='radio' name='isDistribut' id="isDistribut-0" class='j-ipt wst-radio' value='0' <?php if($distObj['isDistribut']==0): ?>checked<?php endif; ?>/><label for="isDistribut-0" class="mt-1"></label>否</label>
      </div>
     </td>
  </tr>
  <tr class='commission_tr' <?php if($distObj['isDistribut'] ==0): ?>style="display:none;"<?php endif; ?>>
     <th>分销佣金<font color='red'>*</font>：</th>
     <td colspan="2">
     	<input type='text' class='j-ipt' id='commission' name="commission" value='<?php echo !empty($distObj["commission"]) ? $distObj["commission"] : 0; ?>' maxLength='10' onblur="javascript:WST.limitDecimal(this,2)" onkeypress="return WST.isNumberdoteKey(event)" onkeyup="javascript:WST.isChinese(this,1)" />
     </td>
  </tr>
  	<script type="text/javascript">
  	$(function(){
	  	$('#editform').validator({
	  	    rules: {
	  	        commission: function(elem, param) {
	  	        	var shopPrice = new Number($("#shopPrice").val());
	  	        	var va = new Number($("#commission").val());
	  	        	if(shopPrice<va){
	  	        		return   '佣金必须小于店铺价格'; 
	  	        	}
	  	        	var isDistribut = $("input[name='isDistribut']:checked").val();
	  	        	if(isDistribut==1 && va<=0){
	  	        		return   '佣金必须大于0'; 
	  	        	}
	  	        }
	  	    },
	  	    fields: {
	  	        'commission': 'required;commission'
	  	    }
	  	});
  	});
	
	<!--
	$('input[name="isDistribut"]').click(function(){
		   if($(this).val()==1){
			   $(".commission_tr").show();
		   }else{
			   $(".commission_tr").hide();
			   $("#'commission'").val(0);
		   }
	});
	//-->
	</script>
<?php endif; ?>