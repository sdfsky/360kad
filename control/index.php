<?php

!defined('IN_TIPASK') && exit('Access Denied');

class indexcontrol extends base {

    function indexcontrol(& $get, & $post) {
        $this->base($get, $post);
    }

    function ondefault() {
        $linklist = $this->cache->load('link', 'id', 'displayorder');
        /* SEO */
        $this->setting['seo_index_title'] && $seo_title = str_replace("{wzmc}", $this->setting['site_name'], $this->setting['seo_index_title']);
        $this->setting['seo_index_description'] && $seo_description = str_replace("{wzmc}", $this->setting['site_name'], $this->setting['seo_index_description']);
        $this->setting['seo_index_keywords'] && $seo_keywords = str_replace("{wzmc}", $this->setting['site_name'], $this->setting['seo_index_keywords']);
        include template('index');
    }
    
    function ontest(){
        $touser = array();
        $touser['username'] = 'songdf';
        $touser['email'] = 'sdf_sky@qq.com';
        sendmail($touser, "ceshineiru", "hello world!");
    }

    function onhelp() {
        $this->load('usergroup');
        $usergrouplist = $_ENV['usergroup']->get_list(2);
        include template('help');
    }

    function ondoing() {
        include template("doing");
    }

    /* 查询图片是否需要点击放大 */

    function onajaxchkimg() {
        list($width, $height, $type, $attr) = getimagesize($this->post['imgsrc']);
        ($width > 300) && exit('1');
        exit('-1');
    }
    
    

}

?>