<p align="center"><h2>Woosa Assesment</h2></p>
<hr>
<p align="center">
<h4>/product/create</h4>
<h5>POST</h5>
<span>All the following parameters are required in the post data:</span><br>
<span>'barcode', 'name', 'cost', 'vat-class'</span>
</p>
<hr>
<p align="center">
<h4>/products/{api}</h4>
<h5>GET</h5>
<span>Show a full list of all the products, where {api} is equal to API of user</span><br>
</p>
<hr>
<p align="center">
<h4>/cash-register/{barcode}</h4>
<h5>GET</h5>
<span>Get a product with barcode</span><br>
<span>where {barcode} in the URL equals barcode of product</span>
</p>
<hr>
<p align="center">
<h4>/cash-register/receipt/create</h4>
<h5>POST</h5>
<span>Create receipt no data needed</span>
</p>
<hr>
<p align="center">
<h4>/cash-register/receipt/{receipt_id}/add-product/{product_id}</h4>
<h5>POST</h5>
<span>Add products to the receipt, where {receipt_id} in the URL equals receipt ID and {product_id} in the URL equals product ID.</span><br>
</p>
<hr>
<p align="center">
<h4>/cash-register/receipt-product/{id}/change-amount</h4>
<h5>POST</h5>
<span>Change products amount of the receipt, where {id} in the URL equals receipt_product ID. The following parameters are required in the post data:</span><br>
<span>'amount'</span>
</p>
<hr>
<p align="center">
<h4>/cash-register/receipt/{receipt_id}/close</h4>
<h5>POST</h5>
<span>Change the receipt to finished so no further changes can be done, where {receipt_id} in the URL equals receipt ID.</span>
</p>
<hr>
<p align="center">
<h4>/cash-register/receipt/{receipt_id}/list</h4>
<h5>GET</h5>
<span>List of all the product with prices and BTW, where {receipt_id} in the URL equals receipt ID.</span>
</p>
