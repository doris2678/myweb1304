<h2 class="ct">修改商品</h2>
<form action="./api/save_item.php" method="post" enctype="multipart/form-data">
<table class="all">
    <?php
     $item=$Item->find($_POST['id']);
    ?>
    <tr>
        <td class="tt ct">所屬大分類</td>
        <td class="pp">
           <select name="big" id="big"></select>
        </td>
    </tr>
    <tr>
        <td class="tt ct">所屬中分類</td>
        <td class="pp">
          <select name="mid" id="mid"></select>
        </td>        
    </tr>
    <tr>
        <td class="tt ct">商品編號</td>
        <td class="pp"><?=$item['no'];?></td>
    </tr>
    <tr>
        <td class="tt ct">商品名稱</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$item['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">商品價格</td>
        <td class="pp"><input type="text" name="price" id="price" value="<?=$item['price'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">規格</td>
        <td class="pp"><input type="text" name="spec" id="spce" value="<?=$item['spec'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">庫存量</td>
        <td class="pp"><input type="text" name="stock" id="stock" value="<?=$item['stock'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">商品圖片</td>
        <td class="pp"><input type="file" name="img" id="img"></td>
    </tr>
    <tr>
        <td class="tt ct">商品介紹</td>
        <td class="pp">
          <textarea name="intro" id="intro" style="width:75%;height:150px;" value="<?=$item['intro'];?>"></textarea>
        </td>
    </tr>
</table>
<div class="ct">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick="location.href='?do=th'">
</div>

</form>

<script>
    getBigs();   

    function getBigs(){
    $.get('./api/get_bigs.php',(options)=>{        
      $('#big').html(options);
      <?php
      if(isset($_GET['id'])){

      }
      ?>
      getMids();
    })
   } 

   function getMids(){
     let big_id=$('#big').val();
      $.get('./api/get_mids.php',{big_id}, (mids)=>{     
        $('#mid').html(mids);
      })
   }

   $('#big').on("change",()=>{
     getMids();
   });

</script>
