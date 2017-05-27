<?php 

use Coolpraz\PhpBlade\PhpBlade;

if (! function_exists('view')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  PhpBlade $instance
     * @param  string   $view
     * @param  array    $data
     * @param  array    $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function view(PhpBlade $instance, $view = null, $data = [], $mergeData = [])
    {
        $factory = $instance->view();
        if (func_num_args() === 1) {
            return $factory;
        }
        return $factory->make($view, $data, $mergeData);
    }
}