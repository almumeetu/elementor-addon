<?php


class Elementor_Test_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'Test Widget';
	}

	public function get_title()
	{
		return esc_html__('Test Widget', 'elementor-addon');
	}

	public function get_icon()
	{
		return 'eicon-animation-text';
	}

	public function get_categories()
	{
		return ['elementor-addon-category'];
	}

	public function get_keywords()
	{
		return ['test', 'heading'];
	}

	public function get_custom_help_url()
	{
		return 'https://example.com/widget-name';
	}

	protected function get_upsale_data()
	{
		return [];
	}

	protected function register_controls()
	{


		//Tab Content - 01
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		//Slider Control
		$this->add_control(
			'font_size',
			[
				'label' => esc_html__( 'Font Size', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} h2' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Dimensions

		//Margin
		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Padding
		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Text Shadow
		$this->add_control(
			'custom_text_shadow',
			[
				'label' => esc_html__( 'Text Shadow', 'elementor-addond' ),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{WRAPPER}} h2' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);


		//Box Shadow
		$this->add_control(
			'custom_box_shadow',
			[
				'label' => esc_html__( 'Box Shadow', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{WRAPPER}}' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
				],
			]
		);


		//Media Control 
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		//Link Control
		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		//Hover Animation
		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		//Exit Animation
		$this->add_control(
			'exit_animation',
			[
				'label' => esc_html__( 'Exit Animation', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::EXIT_ANIMATION,
				'prefix_class' => 'animated ',
			]
		);


		//Animation
		$this->add_control(
			'entrance_animation',
			[
				'label' => esc_html__( 'Entrance Animation', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
		);


		//Repeater
		$this->add_control(
			'list',
			[
				'label' => esc_html__('Repeater List', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__('Title', 'elementor-addon'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('List Title', 'elementor-addon'),
						'label_block' => true,
					],
					[
						'name' => 'list_content',
						'label' => esc_html__('Content', 'elementor-addon'),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__('List Content', 'elementor-addon'),
						'show_label' => false,
					],
					[
						'name' => 'list_color',
						'label' => esc_html__('Color', 'elementor-addon'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
						],
					]
				],
				'default' => [
					[
						'list_title' => esc_html__('Title #1', 'elementor-addon'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'elementor-addon'),
					],
					[
						'list_title' => esc_html__('Title #2', 'elementor-addon'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'elementor-addon'),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);


		//Gallery
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__('Add Images', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

		//Font
		$this->add_control(
			'font_family',
			[
				'label' => esc_html__('Font Family', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .test' => 'font-family: {{VALUE}}',
				],
			]
		);

		//Icon
		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],

			]
		);

		//Color
		$this->add_control(
			'color_option',
			[
				'label' => esc_html__('Color Option', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .test' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'text_align',
			[
				'label' => esc_html__('Alignment', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'elementor-addon'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor-addon'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'elementor-addon'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .h2' => 'text-align: {{VALUE}};',
				],
			]
		);


		//Hidden Controls
		$this->add_control(
			'show_title',
			[
				'label' => esc_html__('Show Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'elementor-addon'),
				'label_off' => esc_html__('Hide', 'elementor-addon'),
				'return_value' => 'yes',
				'default' => 'yes',

			]
		);

		//Title
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Enter your title', 'elementor-addon'),
			]
		);

		//Description
		$this->add_control(
			'item_description',
			[
				'label' => esc_html__('Description', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__('Write Your Description', 'elementor-addon'),
				'placeholder' => esc_html__('Type your description here', 'elementor-addon'),
			]
		);

		//Mobile Number
		$this->add_control(
			'mobile_number',
			[
				'label' => esc_html__('Enter Your Mobile Number', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('e.g. +880 1722 301927', 'elementor-addon'),
				'default' => '',
				'label_block' => true,
			]
		);


		//Rich Description
		$this->add_control(
			'rich_description',
			[
				'label' => esc_html__('Rich Description', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__('Default description', 'elementor-addon'),
				'placeholder' => esc_html__('Type your description here', 'elementor-addon'),
			]
		);


		//Custol Html
		$this->add_control(
			'custom_html',
			[
				'label' => esc_html__('Custom HTML', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 20,
			]
		);


		//Hidden
		$this->add_control(
			'hidden',
			[
				'label' => esc_html__('View', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		//Select
		$this->add_control(
			'color',
			[
				'label' => esc_html__('Color', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'red',
				'options' => [
					'yellow' => esc_html__('Yellow', 'elementor-addon'),
					'red' => esc_html__('Red', 'elementor-addon'),
					'green'  => esc_html__('Green', 'elementor-addon'),
					'blue' => esc_html__('Blue', 'elementor-addon'),
					'none' => esc_html__('None', 'elementor-addon'),
				],
			]
		);

		$this->add_control(
			'show_elements',
			[
				'label' => esc_html__('Show Elements', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => [
					'title'  => esc_html__('Title', 'elementor-addon'),
					'description' => esc_html__('Description', 'elementor-addon'),
					'mobile_number' => esc_html__('Mobile Number', 'elementor-addon'),
					'button' => esc_html__('Button', 'elementor-addon'),
				],
				'default' => ['title', 'description'],
			]
		);
		$this->end_controls_section();



		//Tab Content - 02 
		$this->start_controls_section(
			'section_content_2',
			[
				'label' => esc_html__('Content_2', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);



		$this->end_controls_section();
	}




	//Render Function
	protected function render()
	{

		$settings = $this->get_settings_for_display();
?>
		<?php
		if ($settings['show_title'] == 'yes') {
			echo 'Hello World';
		}
		?>


		<img src="<?php echo $settings['image']['url']; ?>" alt="<?php echo $settings['image']['alt']; ?>">
		<a href="<?php echo $settings['website_link']['url']; ?>">You Tube</a>
		<!-- Animation -->
		<div class="repeat <?php echo $settings['exit_animation'] ; ?>">
		<?php
		$lists = $settings['list'];
		foreach ($lists as $list) {
		?>
			<h4><?php echo $list['list_title']; ?></h4>
			<p><?php echo $list['list_content']; ?></p>
		<?php
		}

		?>
		</div>




		<?php
		$images = $settings['gallery'];
		foreach ($images as $image) {
		?>
			<img src="<?php echo $image['url']; ?>" alt="">
		<?php
		}
		?>

		<ul>
			<?php
			$elements = $settings['show_elements'];
			foreach ($elements as $element) {
			?>
				<li><?php echo $element; ?></li>
			<?php
			}
			?>
		</ul>

		<?php 
				$elementClass = 'container';

				if ( $settings['hover_animation'] ) {
					$elementClass .= ' elementor-animation-' . $settings['hover_animation'];
				}
		
				$this->add_render_attribute( 'wrapper', 'class', $elementClass );
				?>
				<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
					
				</div>
	
		<i class="<?php echo $settings['icon']['value']; ?>"></i>
		<h2 style="text-align:<?php echo $settings['text_align']; ?>">Title: <?php echo $settings['title']; ?></h2>
		<h4>Mobile Number: <?php echo $settings['mobile_number']; ?></h4>
		<h4>Description: <?php echo $settings['item_description']; ?></h4>
		<h4>Rich description: <?php echo $settings['rich_description']; ?></h4>
		<h4 class="test">Test World</h4>


		<code>
			<?php echo $settings['custom_html']; ?>
		</code>
<?php

	}
}
