<?php

namespace Tests; 

use Coolpraz\PhpBlade\PhpBlade;

class PhpBladeTest extends \PHPUnit_Framework_TestCase
{
	protected $blade;

	public function setUp()
	{
		$this->blade = new PhpBlade('tests/views', 'tests/cache');

		$this->blade->compiler()->directive('datetime', function ($expression) {
            return "<?php echo with({$expression})->format('F d, Y g:i a'); ?>";
        });
	}

	/** @test */
	function it_can_read_blade_file_and_display_content()
	{
	    $output = $this->blade->view()->make('basic');
	    // $output = view($this->blade, 'basic');
        $this->assertEquals('hello world', trim($output));
	}

	/** @test */
	function it_can_pass_variable_to_template()
	{
	    $output = $this->blade->view()->make('variables', ['name' => 'John Doe']);
	    // $output = view($this->blade, 'variables', ['name' => 'John Doe']);
        $this->assertEquals('hello John Doe', trim($output));
	}

	/** @test */
	function it_can_render_the_non_blade_file()
	{
	    $output = $this->blade->view()->make('plain');
	    // $output = view($this->blade, 'plain');
        $this->assertEquals('this is plain php', trim($output));
	}

	/** @test */
	function it_can_render_extended_blade_template()
	{
	    $users = require __DIR__.'/data/users.php';

        $blade_name = 'extender';

        $output = $this->blade
        	->view()
            ->make($blade_name, $users);

        $this->assertEquals(
            $output,
            $this->read($blade_name)
        );
	}

	/**
     * HTML Reader on sample_output folder
     *
     * @param string $blade_name The blade file name/path
     *
     * @return string
     */
    protected function read($blade_name)
    {
        $file_path = __DIR__.'/sample_output/'.$blade_name.'.html';

        return file_get_contents($file_path);
    }
}