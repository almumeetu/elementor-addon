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
		return [ 'basic' ];
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

        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'elementor-addon' ),
			]
		);

		$this->end_controls_section();
    }
    protected function render() {

        $settings = $this->get_settings_for_display();
        
        echo $settings['title'];

    }

}