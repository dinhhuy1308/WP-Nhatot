<?php get_header() ?>
<div class="container">
    <form action="#" method="get">
        <div class="my-5 d-flex justify-content-around align-items-center">
            <div class="">


                <?php wp_dropdown_categories([
                    'taxonomy' => 'address_house',
                    'name' => 'cat_address',
                    'show_option_all' => 'Lọc theo địa điểm',
                    'value_field' => 'slug',
                    'selected' => isset($_GET['cat_address']) ? $_GET['cat_address'] : '',
                ]);
                ?>

                <?php wp_dropdown_categories([
                    'taxonomy' => 'price_house',
                    'name' => 'cat_price',
                    'show_option_all' => 'Lọc theo khoảng giá',
                    'value_field' => 'slug',
                    'selected' => isset($_GET['cat_price']) ? $_GET['cat_price'] : '',
                ]);
                ?>

                <?php wp_dropdown_categories([
                    'taxonomy' => 'acreage_house',
                    'name' => 'cat_acreage',
                    'show_option_all' => 'Lọc theo diện tích',
                    'value_field' => 'slug',
                    'selected' => isset($_GET['cat_acreage']) ? $_GET['cat_acreage'] : '',
                ]);
                ?>

                





                <!-- <select name="cat_price" id="cat_price">
                    <option value="">Lọc theo khoảng giá</option>
                    <option value="duoi-5-trieu">Dưới 5 triệu</option>
                    <option value="5-10-trieu">5 -10 triệu</option>
                    <option value="10-15-trieu">10 -15 triệu</option>
                    <option value="tren-15-trieu">Trên 15 triệu</option>
                </select> -->

                <!-- <select name="cat_acreage" id="cat_acreage">
                    <option value="">Lọc theo diện tích</option>
                    <option value="duoi-50-met-vuong">Dưới 50 mét vuông</option>
                    <option value="50-70-met-vuong">50 - 70 mét vuông</option>
                    <option value="70-100-met-vuong">70 - 100 mét vuông</option>
                    <option value="tren-100-met-vuong">Trên 100 mét vuông</option>
                </select> -->

                <select name="cat_room_number" id="cat_room_number">
                    <option value="">Lọc theo số phòng</option>
                    <option value="1">1 phòng ngủ</option>
                    <option value="2">2 phòng ngủ</option>
                    <option value="3">3 phòng ngủ</option>
                </select>
            </div>
        </div>
        <button class="btn btn-success d-flex mb-5" style="margin: 0 auto;">Submit</button>
    </form>

    <!-- <div class="col-4">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Lọc theo khoảng giá
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Dưới 5 triệu</p>
                            <p>5 -10 triệu</p>
                            <p>10 -15 triệu</p>
                            <p>Trên 15 triệu</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Lọc theo diện tích
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Lọc theo số phòng
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    <div class="row">
        <?php
        $args = [
            'post_type' => 'buy_house',
            'posts_per_page' => -1,
            // 'posts_per_page' => 4,
        ];

        $tax_query = [];

        // Filter by address 
        $cat_address = isset($_GET['cat_address']) ? $_GET['cat_address'] : '';
        if (!empty($cat_address)) {
            $tax_query[] = [
                'taxonomy' => 'address_house',
                'field' => 'slug',
                'terms' => $cat_address,
            ];
        }

        // Filter by price
        $cat_price = isset($_GET['cat_price']) ? $_GET['cat_price'] : '';
        if (!empty($cat_price)) {
            $tax_query[] = [
                'taxonomy' => 'price_house',
                'field' => 'slug',
                'terms' => $cat_price,
            ];
        }

        // Filter by acreage
        $cat_acreage = isset($_GET['cat_acreage']) ? $_GET['cat_acreage'] : '';
        if (!empty($cat_acreage)) {
            $tax_query[] = [
                'taxonomy' => 'acreage_house',
                'field' => 'slug',
                'terms' => $cat_acreage,
            ];
        }

        // Filter by room_number
        $cat_room_number = isset($_GET['cat_room_number']) ? $_GET['cat_room_number'] : '';
        if (!empty($cat_room_number)) {
            $args['meta_query'] = array(
                'meta_query' => array(
                    array(
                        'key'     => 'so_phong_ngu',
                        'value'   => $cat_room_number,
                    ),
                ),
            );
        }

        if (count($tax_query) > 0) {
            $args['tax_query'] = $tax_query;
        }


        ?>



        <!-- <div class="col-12 mt-5" style=""> -->
        <?php
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $price = get_field('gia_trieu_dongthang');
                $num_room = get_field('so_phong_ngu');
                $acreage = get_field('dien_tich_met_vuong');
                $address = get_field('dia_chi');
        ?>
                <div class="col-6">
                    <a href="#">
                        <div class="card mb-3">
                            <div class="row g-0 align-items-center">
                                <a class="col-md-4" href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('thumbnail') ?>
                                </a>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php the_title() ?></h5>
                                        <p class="acreage"><?php echo $acreage ?> mét vuông - <?php echo $num_room; ?> PN</p>
                                        <p class="price"><?php echo $price ?> triệu/tháng </p>
                                        <p class="card-text"><small class="address"><?php echo $address ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Sorry, no posts matched your criteria.
            </div>
        <?php
            // esc_html_e('Sorry, no posts matched your criteria.');
        }
        wp_reset_postdata();
        ?>
        <!-- <div class="col-12">
                    <a href="#">
                        <div class="card mb-3" style=" height: 180px;">
                            <div class="row g-0">
                                <div class="col-md-4" style="width: max-content;">
                                    <img style="height: 180px;" src="https://i.pravatar.cc/?u=2" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">CHO THUÊ NHÀ 5 TẦNG CHỢ BẾN NGỰ, TP HUẾ 8X20</h5>
                                        <p class="acreage">800 mét vuông - 3 PN</p>
                                        <p class="price">10,3 triệu/tháng </p>
                                        <p class="card-text"><small class="address">Phường Vĩnh Ninh</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->

        <!-- </div> -->
    </div>
</div>

<?php get_footer() ?>