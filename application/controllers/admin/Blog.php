<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$query = $this->db->query("SELECT * FROM `articles` ORDER BY blogid DESC");

		$data['result'] = $query->result_array();
		$this->load->view('adminpanel/viewblog',$data);
	}

	function addblog(){
		$this->load->view('adminpanel/addblog');
	}

	function addblog_post(){
		if ($_FILES) {
			$config['upload_path']          = './assets/upload/blogimg/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    die("Error");
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $fileurl = "assets/upload/blogimg/".$data['upload_data']['file_name'];
                    $blogTitle = $_POST['blogTitle'];
                    $description = $_POST['description'];

                    $query = $this->db->query("INSERT INTO `articles`(`blogTitle`, `blogDescription`, `blogImage`) VALUES ('$blogTitle','$description','$fileurl')");

                    if ($query) {
                    	$this->session->set_flashdata('inserted', 'yes');
                    	redirect('admin/blog/addblog');
                    }
                    else{
                    	$this->session->set_flashdata('inserted', 'no');
                    	redirect('admin/blog/addblog');
                    }
            }
		}
		else{
			// Image is not passed
		}

	}


	function editblog($blog_id){
		$query = $this->db->query("SELECT  `blogTitle`, `blogDescription`, `blogImage`, `status` FROM `articles` WHERE `blogid`='$blog_id'");

		$data['result'] = $query->result_array();
		$data['blog_id'] = $blog_id;

		$this->load->view("adminpanel/editblog",$data);
	}

	function editblog_post(){
		print_r($_FILES);
		if ( $_FILES['file']['name'] ) {

			$config['upload_path']          = './assets/upload/blogimg/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    die("Error");
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $filename_location = "assets/upload/blogimg/". $data['upload_data']['file_name'];

                    $blog_title = $_POST['blogTitle'];
                    $desc = $_POST['desc'];
                    $blog_id = $_POST['blog_id'];
                    $publish_unpublish = $_POST['publish_unpublish'];


                    $query = $this->db->query("UPDATE `articles` SET `blogTitle`='$blog_title',`blogDescription`='$desc',`blogImage`='$filename_location', `status`='$publish_unpublish' WHERE `blogid`='$blog_id'");

                    if ($query) {
                    	$this->session->set_flashdata('updated', 'yes');
                    	redirect("admin/blog");
                    }else{
                    	$this->session->set_flashdata('updated', 'no');
                    	redirect("admin/blog");
                    }
            }



		}else{
			$blog_title = $_POST['blogTitle'];
            $desc = $_POST['desc'];
            $blog_id = $_POST['blog_id'];
            $publish_unpublish = $_POST['publish_unpublish'];


            $query = $this->db->query("UPDATE `articles` SET `blogTitle`='$blog_title',`blogDescription`='$desc', status='$publish_unpublish' WHERE `blogid`='$blog_id'");

            if ($query) {
            	$this->session->set_flashdata('updated', 'yes');
            	redirect("admin/blog");
            }else{
            	$this->session->set_flashdata('updated', 'no');
            	redirect("admin/blog");
            }
		}
	}
	function deleteblog(){
		//print_r($_POST);

		$delete_id = $_POST['delete_id'];

		$qu = $this->db->query("DELETE FROM `articles` WHERE `blogid`='$delete_id'");

		if ($qu) {
			echo "deleted";
		}else{
			echo "notdeleted";
		}
	}

}