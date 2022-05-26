<?php
$this->load->view('layout/layoutTop');
?>
<style>
    .vendororder{
        background: #fff;
        border-bottom: 2px solid #c5c5c5;
        border-top: 4px solid #000;
    }
    .vendor-text{
        float: left;
        height: 39px;
        /* vertical-align: middle; */
        line-height: 37px;
        font-size: 21px;
        padding-right: 15px;
        border-right: 1px solid #c5c5c5;
        margin-right: 12px;
    }

</style>
<style>
    .measurement_right_text{
        float: right;
    }
    .measurement_text{
        float: left;
    }
    .fr_value{
        font-size: 15px;
        margin-top: -7px;
        float: left;
    }
    .productStatusBlock{
        padding:10px;
        border: 1px solid #000;
        float: left;
        margin: 5px;
    }

    .payment_block{
        padding: 10px;
        padding-top: 30px;
        margin: 0px;
        margin-top: 30px;
        background: #ddd;
        border: 6px solid #ff3b3b;
    }
</style>

<section class="content" style="min-height: auto;">

    <div class="row">
        <!--title row--> 
        <div class="col-md-12">



            <div class="col-md-9">


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Order No.:<?php echo $ordersdetails['order_data']->order_no; ?></h3>
                    </div>


                    <form role="form" action="#" method="post">
                        <div class="box-body">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Order Status</label>
                                    <?php if ($status!='Other') { ?>
                                        <input class="form-control" readonly="" name="status" value="<?php echo $status; ?>">
                                    <?php } else { ?>
                                        <input class="form-control"  name="status" value="<?php echo $status!='Other'?$status:''; ?>">
                                    <?php } ?>

                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Remark <small>(It will be subject of email.)</small></label>
                                    <input type="text" class="form-control" placeholder="Remark for order status"  name="remark" required="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description <small>(It will be message body of email.)</small></label>
                                    <textarea class="form-control" placeholder="Enter Message"  name="description"></textarea>
                                </div>
                            </div>

                        </div>
                        <!--/.box-body--> 

                        <div class="box-footer ">
                            <div class="col-md-12 form-group">
                                <div class="col-md-4" style="    background: #e1e1e1;">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="sendmail" checked="true">
                                            Notify to customer by mail.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary btn-lg" style="    font-size: 13px;" name="submit" value="submit">Submit</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <?php
                $this->load->view('Order/orderstatusside');
                ?>
            </div>
        </div>
</section>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">

            <?php
            foreach ($user_order_status as $key => $value) {
                ?>

                <ul class="timeline">
                    <!--timeline time label--> 
                    <li class="time-label">
                        <span class="bg-red">
                            <?php echo $value->c_date; ?>
                        </span>
                    </li>
                    <!--/.timeline-label--> 

                    <!--timeline item--> 
                    <li>
                        <!--timeline icon--> 
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $value->c_time; ?></span>

                            <h3 class="timeline-header"><a href="#"><?php echo $value->status ?></a></h3>

                            <div class="timeline-body">
                                <?php echo $value->remark; ?><br/>
                                <?php echo $value->description; ?>
                            </div>

                            <div class="timeline-footer">
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('Order/remove_order_status/' . $value->id . "/" . $order_key); ?>"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                    </li>
                    <!--END timeline item--> 

                </ul>

                <?php
            }
            ?>

        </div>
    </div>
</div>
<?php
$this->load->view('Order/orderinfocomman');
?> 

<div class="clearfix"></div>








<?php
$this->load->view('layout/layoutFooter');
?> 