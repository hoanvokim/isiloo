<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 18.10.18
 * Time: 09:59
 */
?>
<?php $this->load->view('webapp/tpl_header'); ?>
    <!-- ***** Why Chose Us Area Start ***** -->
    <section class="whyChoose-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="aboutUs-headline">
                        <h2>Thành tích học tập</h2>
                    </div>
                    <p><?php echo $prizeContent; ?></p>
                </div>
            </div>
        </div>

        <div class="team--member-area">
            <div class="container-fluid">
                <?php $displayRow = 0; ?>
                <?php foreach ($students as $item) { ?>
                    <?php if ($displayRow == 0) { ?>
                        <div class="row">
                    <?php } ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg">
                        <div class="single-team-member">
                            <!-- Team Member Thumb -->
                            <div class="team-member-thumb">
                                <img src="<?php echo base_url() . $item->img; ?>" alt="">
                                <!-- Overlay -->
                                <div class="team-member-overlay">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <!-- Team Content -->
                            <div class="single-team-content">
                                <i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i
                                        class="ion-ios-star"></i><i class="ion-ios-star"></i>
                                <h4><?php echo $item->name; ?></h4>
                                <span><?php echo $item->prize; ?></span>
                                <p>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i> <br/>
                                    <?php echo $item->prize_content; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php if ($displayRow == 3) {
                        $displayRow = 0; ?>
                        </div>
                    <?php } else if ($displayRow < 4) {
                        $displayRow++;
                    }
                } ?>
            </div>
        </div>
    </section>
    <!-- ***** Why Chose Us Area End ***** -->
<?php $this->load->view('webapp/tpl_footer'); ?>