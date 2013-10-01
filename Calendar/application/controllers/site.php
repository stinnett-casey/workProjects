<?php

	Class Site extends CI_Controller{

		function logged_in($year = null, $month = null){
			$data = array();
			$data['appt_array'] = array();

			if(!$year){
				$year = date('Y');
			}

			if(!$month){
				$month = date('m');
			}
			//Load calendar model
			$this->load->model('calendar_m');

			if($day = $this->input->post('day')){
				$this->calendar_m->add_calendar_memo("$year-$month-$day", $this->input->post('memo'));
			}
		
			//Create the page
			$data['calendar'] = $this->calendar_m->generate_calendar($year, $month);
			$this->load->view('calendar', $data);
		}


	}