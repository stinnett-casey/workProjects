<?php

Class Calendar_m extends CI_Model{

	var $config;

	function Calendar_m(){
		parent::__construct();

		$this->config = array(
			'show_next_prev' => TRUE,
			'next_prev_url' => base_url() . index_page() . '/site/logged_in'
		);

		$plus = base_url('images/plus.png');
		$minus = base_url('images/minus.png');

		$this->config['template'] = '
			{table_open}<table border="0" cellpadding="0" cellspacing="0" id="calendar">{/table_open}

			{heading_row_start}<tr>{/heading_row_start}

			{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

			{heading_row_end}</tr>{/heading_row_end}

			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td class="day_name">{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}

			{cal_row_start}<tr>{/cal_row_start}
			{cal_cell_start}<td class="cal_day">{/cal_cell_start}

			{cal_cell_content}
				<div class="day">{day}</div>
				<div class="add_delete">
					<div class="has_minus"><img class="img" src="' . $minus . '"></div>
					<div class="has_plus"><img class="img" src="' . $plus . '"></div>
				</div>
				<div class="memo">{content}</div>
			{/cal_cell_content}
			{cal_cell_content_today}
				<div class="day highlight">{day}</div>
				<div class="add_delete">
					<div class="has_minus"><img class="img" src="' . $minus . '"></div>
					<div class="has_plus"><img class="img" src="' . $plus . '"></div>
				</div>
				<div class="memo">{content}</div>
			{/cal_cell_content_today}

			{cal_cell_no_content}
				<div class="day">{day}</div>
				<div class="add_delete">
					<div class="has_minus"><img class="img" src="' . $minus . '"></div>
					<div class="has_plus"><img class="img" src="' . $plus . '"></div>
				</div>
			{/cal_cell_no_content}
			{cal_cell_no_content_today}
				<div class="day highlight">{day}</div>
				<div class="add_delete">
					<div class="has_minus"><img class="img" src="' . $minus . '"></div>
					<div class="has_plus"><img class="img" src="' . $plus . '"></div>
				</div>
			{/cal_cell_no_content_today}

			{cal_cell_blank}&nbsp;{/cal_cell_blank}

			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}

			{table_close}</table>{/table_close}
		';

	}


	function get_user_appointments($user_id){
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('appointments');

		$cal_data = array();

		foreach ($query->result() as $row) {
			$cal_data[substr($row->date, 8, 2)] = $row->memo;
		}

		return $cal_data;
	}




	function generate_calendar($year, $month){
		
		$this->load->library('calendar', $this->config);

		$cal_data = $this->get_user_appointments($this->session->userdata('id'));

		return $this->calendar->generate($year, $month, $cal_data);
	}

	function add_calendar_memo($date, $memo){
		$id = uniqid();
		if($this->db->where('id', $id)->get()->num_rows() == 0){
			$this->db->insert('appointments', array(
			'id' => $id,
			'user_id' => $this->session->userdata('id'),
			'memo' => $memo,
			'date' => $date
		));
		}else{
			$this->add_calendar_memo($date, $memo);
		}
		
	}
	function update_calendar_memo($id, $date, $memo){

	}

}