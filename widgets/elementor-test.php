<?php


class Elementor_Test_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'Test Widget';
	}

	public function get_title() {
		return esc_html__( 'Test Widget', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-animation-text';
	}

	public function get_categories() {
		return [ 'elementor-addon-category' ];
	}

	public function get_keywords() {
		return [ 'test', 'heading' ];
	}

	public function get_custom_help_url() {
		return 'https://example.com/widget-name';
	}

	protected function get_upsale_data() {
		return [];
	}

    protected function register_controls() {

        $this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		//Hidden Controls
        $this->add_control(
			'show_title',
			[
				'label' => esc_html__( 'Show Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'elementor-addon'),
				'label_off' => esc_html__( 'Hide', 'elementor-addon'),
				'return_value' => 'yes',
				'default' => 'yes',

			]
		);


        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'elementor-addon' ),
			]
		);
		$this->add_control(
			'hidden',
			[
				'label' => esc_html__( 'View', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		
		//Select
		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'red',
				'options' => [
					'yellow' => esc_html__( 'Yellow', 'elementor-addon' ),
					'red' => esc_html__( 'Red', 'elementor-addon' ),
					'green'  => esc_html__( 'Green', 'elementor-addon' ),
					'blue' => esc_html__( 'Blue', 'elementor-addon' ),
					'none' => esc_html__( 'None', 'elementor-addon' ),
				],
			]
		);


		$this->end_controls_section();
    }
    protected function render() {

        $settings = $this->get_settings_for_display();
		?>
		<?php 
			if($settings['show_title']=='yes'){
				echo 'Hello World';
			}
		?>
		<h4 style="Color:<?php echo $settings['color']; ?>">Title: <?php echo $settings['title']; ?></h4>        
		<h4>Number: <?php echo $settings['number']; ?></h4>        
		<h4>Description: <?php echo $settings['desc']; ?></h4>        
		<h4>Rich description: <?php echo $settings['rich_descr']; ?></h4>  
		
		<code>
			<?php echo $settings ['code']; ?>
		</code>
		<?php

	}

}