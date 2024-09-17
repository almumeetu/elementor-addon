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
				'label' => esc_html__( 'Rich Description', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'elementor-addon' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor-addon' ),
			]
		);


		//Custol Html
		$this->add_control(
			'custom_html',
			[
				'label' => esc_html__( 'Custom HTML', 'elementor-addon' ),
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
				'label' => esc_html__('Color', 'textdomain'),
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
				'label' => esc_html__( 'Show Elements', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => [
					'title'  => esc_html__( 'Title', 'elementor-addon' ),
					'description' => esc_html__( 'Description', 'elementor-addon' ),
					'mobile_number' => esc_html__( 'Mobile Number', 'elementor-addon' ),
					'button' => esc_html__( 'Button', 'elementor-addon' ),
				],
				'default' => [ 'title', 'description' ],
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

		<!-- <pre>
			<?php print_r($settings['show_elements']); ?>
		</pre> -->

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

		<h4 style="Color:<?php echo $settings['color']; ?>">Title: <?php echo $settings['title']; ?></h4>
		<h4>Mobile Number: <?php echo $settings['mobile_number']; ?></h4>
		<h4>Description: <?php echo $settings['item_description']; ?></h4>
		<h4>Rich description: <?php echo $settings['rich_description']; ?></h4>


		<code>
			<?php echo $settings['custom_html']; ?>
		</code>
<?php

	}
}
