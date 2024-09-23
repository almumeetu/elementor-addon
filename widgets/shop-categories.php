<?php
class Shop_Categories_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'shop_categories';
    }

    public function get_title() {
        return __( 'Shop Categories', 'elementor-addond' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'elementor-addond' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'category_1_image',
            [
                'label' => __( 'Category 1 Image', 'elementor-addond' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'category_1_title',
            [
                'label' => __( 'Category 1 Title', 'elementor-addond' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Man\'s T-Shirt', 'elementor-addond' ),
            ]
        );

        // Repeat for other categories

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="shop__categories">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-8 text-center">
                        <div class="section__title">
                            <span class="sub__title">Shop By categories</span>
                            <h2 class="main__title pb-50">Best for your categories</h2>
                        </div>
                    </div>
                </div>
                <div class="best__product-category">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="category d-flex align-items-center justify-content-between">
                                <div class="category__author">
                                    <h5><?php echo esc_html( $settings['category_1_title'] ); ?></h5>
                                    <span>Smart and Casual</span>
                                    <a href="#" class="shop__btn">Shop Now</a>
                                    <div class="count__products">
                                        <a href="#"><img src="<?php echo esc_url( plugins_url( '/assets/img/shop-categories/Vector.png', __FILE__ ) ); ?>" alt="icon"> 10 Products</a>
                                    </div>
                                </div>
                                <div class="category__img">
                                    <img src="<?php echo esc_url( $settings['category_1_image']['url'] ); ?>" alt="cat-img">
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other categories -->
                    </div>
                </div>
            </div>
        </section>
        <?php
    }

    protected function _content_template() {
        ?>
        <# var image = settings.category_1_image.url; #>
        <section class="shop__categories">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-8 text-center">
                        <div class="section__title">
                            <span class="sub__title">Shop By categories</span>
                            <h2 class="main__title pb-50">Best for your categories</h2>
                        </div>
                    </div>
                </div>
                <div class="best__product-category">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="category d-flex align-items-center justify-content-between">
                                <div class="category__author">
                                    <h5>{{{ settings.category_1_title }}}</h5>
                                    <span>Smart and Casual</span>
                                    <a href="#" class="shop__btn">Shop Now</a>
                                    <div class="count__products">
                                        <a href="#"><img src="<?php echo esc_url( plugins_url( '/assets/img/shop-categories/Vector.png', __FILE__ ) ); ?>" alt="icon"> 10 Products</a>
                                    </div>
                                </div>
                                <div class="category__img">
                                    <img src="{{{ image }}}" alt="cat-img">
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other categories -->
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
