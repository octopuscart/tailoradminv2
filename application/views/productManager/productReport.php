<?php
$this->load->view('layout/layoutTop');
?>
<style>
    .product_text {
        float: left;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        width:100px
    }
    .product_title {
        font-weight: 700;
    }
    .price_tag{
        float: left;
        width: 100%;
        border: 1px solid #222d3233;
        margin: 2px;
        padding: 0px 2px;
    }
    .price_tag_final{
        width: 100%;
    }
    .sub_item_table tr{
        border-bottom: 1px solid #dbd3d3;
    }
    span.colorbox {
        float: left;
        width: 100%;
        padding: 5px;
        text-align: center;
        color: white;
        text-shadow: 0px 2px 4px #fff;
    }

</style>
<!-- Main content -->
<section class="content">
    <div class="">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Product Reports</h3>
            </div>
            <div class="box-body">
                <table id="tableData" class="table table-bordered ">
                    <thead>
                        <tr>
                            <th style="width: 20px;">S.N.</th>
                            <th style="width:50px;">Image</th>
                            <th style="width:150px;">Category</th>
                            <th style="width:50px;">SKU</th>
                            <th style="width:100px;">Title</th>
                            <th style="width:100px;">Color</th>
                            <th style="width:200px;">Short Description</th>
                            <th >Items Prices</th>
                            <th style="width: 75px;">Edit</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>


    </div>
</section>
<!-- end col-6 -->
</div>

<div class="modal fade" id="attributeModel" tabindex="-1" role="dialog" aria-labelledby="attributeModel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add/Change Color</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_attr" value="save_attr" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$this->load->view('layout/layoutFooter');
?> 
<script>
    $(function () {

        $('#tableData').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "<?php echo site_url("ProductManager/productReportApi") ?>",
                type: 'GET'
            },
            "columns": [
                {"data": "s_n"},
                {"data": "image"},
                {"data": "category"},
                {"data": "sku"},
                {"data": "title"},
                {"data": "color"},
                {"data": 'short_description'},
                {"data": "items_prices"},
                {"data": "edit"}]
        })
    })

</script>