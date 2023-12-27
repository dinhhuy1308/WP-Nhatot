<?php get_header() ?>
<?php while (have_posts()) : the_post(); ?>
    <?php
    $price = get_field('gia_trieu_dongthang');
    $num_room = get_field('so_phong_ngu');
    $acreage = get_field('dien_tich_met_vuong');
    $address = get_field('dia_chi');
    $description = get_field('mo_ta_chi_tiet');
    ?>
    <div class="product-detail" style="background: #f1e7e766">
        <div class="container">
            <div class="row">
                <div class="col-12" style="width: 800px; margin: 0 auto">
                    <div>
                        <?php the_post_thumbnail('medium_large'); ?>
                    </div>
                    <div style="background: #fff; padding: 20px; box-shadow: 0px 5px 15px #888888; margin: 15px 0; border-radius: 20px">
                        <h3 style="font-size: 25px;">
                            <i class="fa-solid fa-key"></i>
                            <i class="fa-solid fa-key"></i>
                            <?php the_title() ?>
                        </h3>
                        <p class="acreage" style="color: #000"><span class="price"><?php echo $price ?> triệu/tháng</span> - <?php echo $acreage; ?> mét vuông</p>
                        <!-- <?php echo $price ?> triệu/tháng - <?php echo $acreage ?> mét vuông -->
                        <p class='mb-0'>
                            <i class="fa-solid fa-location-dot"></i>
                            <?php echo $address ?>
                        </p>
                        <p class='mb-0'>
                            <i class="fa-solid fa-clock"></i>
                            Đã đăng được ... tiếng
                        </p>
                        <p class='mb-0'>
                            <i class="fa-solid fa-circle-check"></i>
                            Tin đã được kiểm duyệt
                        </p>
                    </div>

                    <div style="background: #fff; padding: 20px; box-shadow: 0px 5px 15px #888888; margin: 15px 0; border-radius: 20px">
                        <h3 style="font-size: 25px;">
                            Đặc điểm bất động sản
                        </h3>
                        <div class="characteristic" style="display: grid; grid-template-columns: 1fr 1fr;">
                            <div class="characteristic-item"><i class="fa-solid fa-cart-plus"></i> Cho thuê</div>
                            <div class="characteristic-item"><i class="fa-solid fa-cart-plus"></i> Số phòng ngủ: <?php echo $num_room ?> phòng</div>
                            <div class="characteristic-item"><i class="fa-solid fa-chart-gantt"></i> Diện tích: <?php echo $acreage ?> mét vuông</div>
                            <div class="characteristic-item"><i class="fa-solid fa-house-user"></i> Loại hình nhà ở: Nhà mặt phố, mặt tiền</div>
                        </div>

                    </div>

                    <div style="background: #fff; padding: 20px; box-shadow: 0px 5px 15px #888888; margin: 15px 0; border-radius: 20px">
                        <h3 style="font-size: 25px;">
                            Mô tả chi tiết
                        </h3>
                        <div class="description">
                            <p><i class="fa-solid fa-key"></i>
                                <i class="fa-solid fa-key"></i>
                                <?php the_title() ?>
                            </p>
                            <p><i class="fa-solid fa-arrow-right"></i>Thông tin chi tiết:</p>
                            <?php echo $description ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


<?php endwhile ?>
<?php get_footer() ?>