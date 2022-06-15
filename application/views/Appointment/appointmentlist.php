<?php
$this->load->view('layout/layoutTop');
?>
<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- /.col -->
        <div class="col-md-12">
            <div class="panel panel-inverse" data-sortable-id="index-5">
                <div class="panel-heading">
                    <h4 class="panel-title" style ="font-size:17px; font-weight:500; ">
                        <i class="fa fa-list"></i>  Appointment List
                    </h4>
                    <div class="btn-group btn-group-sm pull-right" >
                        <a class="btn btn-success"  data-toggle="" data-placement="left" title="Download Pdf" href="http://www.nitafashions.com/nitaFashionsAdmin/index.php/Appointment/appointment_pdf" style="margin-top: -25px;"><i class="fa fa-download"></i> </a>

                    </div>
                    
                </div>
                       <div class="box-header with-border">
                    <?php
                    $this->load->view('layout/orderdates');
                    ?>
                </div>
                <div class="panel panel-body" style='overflow: overlay;'>
                    <table id="location_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SN.</th>
                                <?php
                                $reportheader = [
"appointment_type", "aid", "country", "city_state", "hotel", "address", "days", "start_date", "end_date", "contact_no", "date", "from_time", "to_time"
                                ];

                                foreach ($reportheader as $hkey => $hvalue) {
                                    ?>
                                <th ><?php echo strtoupper(($hvalue)); ?></th>
                                    <?php
                                }
                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reports as $key => $value) {
                                echo "<tr><td>$key</td>";
                                foreach ($reportheader as $hkey => $hvalue) {
                                    ?>
                                <td><?php echo $value[$hvalue]; ?></td>
                                <?php
                            }
                            echo "</tr>";
                        }
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- /.row -->
</section>
<!-- /.content -->

<?php
$this->load->view('layout/layoutFooter');
?> 
<script src="<?php echo base_url(); ?>assets_main/tinymce/js/tinymce/tinymce.min.js"></script>


<script>
    $(function () {
        tinymce.init({selector: 'textarea', plugins: 'advlist autolink link image lists charmap print preview'});


    })


    $(function () {
        $("#daterangepicker").daterangepicker({
            format: 'YYYY-MM-DD',
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                "Today's": [moment(), moment()],
                "Yesterday's": [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function (start, end, label) {
            $('input[name=daterange]').val(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        $('#location_table').DataTable({
            "language": {
                "search": "Search Order By Email, First Name, Last Name Etc."
            }
        })
    })
</script>
