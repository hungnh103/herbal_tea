<?php
$pid = $_GET['pid'];
$data = "";
$data['current_page'] = $_GET['page'];
$mproduct = new Model_Product;
$meffect = new Model_Effect;
$meffect->select("oeid, content");
$data['effect'] = $meffect->listEffect();

$data['product'] = $mproduct->getProductById($pid);

if(isset($_POST['ok'])){
  $name = $outstanding_effect = $packing_method = $price = $image = $description = "";
  if(empty($_POST['txtname'])){
    $data['error'][] = "Vui lòng không xoá TÊN";
  }else{
    $name = $_POST['txtname'];
  }

  $outstanding_effect = $_POST['outstanding_effect'];
  $packing_method = $_POST['packing_method'];

  if(empty($_POST['price'])){
    $data['error'][] = "Vui lòng không xoá GIÁ";
  }else{
    $price = $_POST['price'];
  }

  if(!empty($_FILES['image']['name'])){
    $image = $_FILES['image']['name'];
  }else{
    $image = "none";
  }

  if(empty($_POST['description'])){
    $data['error'][] = "Vui lòng không xoá MÔ TẢ CHI TIẾT";
  }else{
    $description = $_POST['description'];
  }

  if($name && $outstanding_effect && $packing_method && $price && $image && $description){
    $check_data = array(
                    "name =" => $name,
                    "pid <>" => $pid
                  );
    $mproduct->select("pid");
    if($mproduct->checkProduct($check_data) == true){
      $mproduct->select("price");
      $old_price = $mproduct->getProductById($pid);

      $input_data = array(
                      "name" => $name,
                      "packing_method" => $packing_method,
                      "description" => $description
                    );

      if ($old_price['price'] != $price) {
        $input_data['price'] = $price;
        $price_diff = $price - $old_price['price'];
        // update invoices table and invoice_details table
        $minvoice = new Model_Invoice;
        $minvoice->select("iid, total");
        $minvoice->where("status = '1'");
        $invoices_data = $minvoice->listInvoice();

        $minvoicedetail = new Model_InvoiceDetail;
        $update_invoice_detail = array("price" => $price);
        foreach ($invoices_data as $item) {
          $minvoicedetail->where(array("iid =" => $item['iid'], "pid =" => $pid));
          $product_quantity_in_cart =  $minvoicedetail->getQuantity();
          if (!empty($product_quantity_in_cart)) {
            $minvoicedetail->updateInvoiceDetail($update_invoice_detail);

            $new_total = $item['total'] + $price_diff * $product_quantity_in_cart['quantity'];
            $minvoice->where(array("iid =" => $item['iid'], "status =" => "1"));
            $update_invoice = array("total" => $new_total);
            $minvoice->updateInvoice($update_invoice);
          }
        }
      }

      if($image != "none"){
        $input_data['image'] = $image;
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/products/".$_FILES['image']['name']);
      }

      if($outstanding_effect != $data['product']['oeid']){
        $input_data['oeid'] = $outstanding_effect;
        $meffect->changeAmountWhenEditProduct($data['product']['oeid'], $data['product']['quantity'], $outstanding_effect);
      }

      $mproduct->where("pid = '$pid'");
      $mproduct->updateProduct($input_data);

      redirect("index.php?controller=salesmanager&resources=product&page=$data[current_page]");
    }else{
      $data['error'][] = "TRÙNG TÊN với sản phẩm khác";
    }
  }
}

$data['title_tag'] = "Chỉnh sửa sản phẩm";
loadview("salesmanager/product/edit", $data);
