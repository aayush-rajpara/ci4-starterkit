<?php
    
use Menus\Models\MenusModel;

if (!function_exists('nestable')) {
    /**
     * Helpers for build menu.
     *
     * @return array
     */
    function nestable()
    {
        /**
         * Function parse.
         *
         * @param item       array
         * @param parent_id  int
         *
         * @return array
         */
        function nest($item, $parent_id)
        {
            $data = [];
            foreach ($item as $value) {
                if ($value->parent_id == $parent_id) {
                    $child = nest($item, $value->id);
                    $value->children = $child ? $child : '';
                    $data[] = $value;
                }
            }
            return $data;
        }
        return nest((new MenusModel())->orderBy('sequence', 'asc')->get()->getResultObject(), 0);
    }
}

?>