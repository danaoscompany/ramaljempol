<?php

class Admin extends CI_Controller {

	public function login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$expiry = $this->input->post('expiry');
		
		$admins = $this->db->query("SELECT * FROM `admins` WHERE `email`='" . $email . "' AND `password`='" . $password . "'")->result_array();
		if (sizeof($admins) > 0) {
			$admin = $admins[0];
			echo json_encode(array(
				'response_code' => 1,
				'user_id' => intval($admin['id']),
				'super_admin' => 0
			));
		} else {
			echo json_encode(array(
				'response_code' => -2
			));
		}
	}

	public function get_users() {
		$adminID = intval($this->input->post('admin_id'));
		$start = intval($this->input->post('start'));
		$length = intval($this->input->post('length'));
		$users = $this->db->query("SELECT * FROM `user` WHERE `admin_id`=" . $adminID . " ORDER BY `first_name` ASC LIMIT " . $start . "," . $length)->result_array();
		for ($i=0; $i<sizeof($users); $i++) {
		}
		echo json_encode($users);
	}
	
	public function get_all_users() {
		$start = intval($this->input->post('start'));
		$length = intval($this->input->post('length'));
		$users = $this->db->query("SELECT * FROM `user` ORDER BY `first_name` ASC LIMIT " . $start . "," . $length)->result_array();
		for ($i=0; $i<sizeof($users); $i++) {
		}
		echo json_encode($users);
	}

	public function get_admins() {
		$start = intval($this->input->post('start'));
		$length = intval($this->input->post('length'));
		$admins = $this->db->query("SELECT * FROM `admins` ORDER BY `email` ASC LIMIT " . $start . "," . $length)->result_array();
		for ($i=0; $i<sizeof($admins); $i++) {
		}
		echo json_encode($admins);
	}
	
	public function update_settings() {
		$introText1In = $_POST['intro_text_1_in'];
		$introText2In = $_POST['intro_text_2_in'];
		$introText1En = $_POST['intro_text_1_en'];
		$introText2En = $_POST['intro_text_2_en'];
		$this->db->update('settings', array(
			'intro_text_1_in' => $introText1In,
			'intro_text_2_in' => $introText2In,
			'intro_text_1_en' => $introText1En,
			'intro_text_2_en' => $introText2En
		));
	}
	
	public function update_zodiac_settings() {
		$common = $_POST['common'];
		$romanceAquarius = $_POST['romance_aquarius'];
		$romanceAries = $_POST['romance_aries'];
		$romanceCancer = $_POST['romance_cancer'];
		$romanceCapricorn = $_POST['romance_capricorn'];
		$romanceGemini = $_POST['romance_gemini'];
		$romanceLeo = $_POST['romance_leo'];
		$romanceLibra = $_POST['romance_libra'];
		$romancePisces = $_POST['romance_pisces'];
		$romanceSagitarius = $_POST['romance_sagitarius'];
		$romanceScorpio = $_POST['romance_scorpio'];
		$romanceTaurus = $_POST['romance_taurus'];
		$romanceVirgo = $_POST['romance_virgo'];
		$deficiencyAquarius = $_POST['deficiency_aquarius'];
		$deficiencyAries = $_POST['deficiency_aries'];
		$deficiencyCancer = $_POST['deficiency_cancer'];
		$deficiencyCapricorn = $_POST['deficiency_capricorn'];
		$deficiencyGemini = $_POST['deficiency_gemini'];
		$deficiencyLeo = $_POST['deficiency_leo'];
		$deficiencyLibra = $_POST['deficiency_libra'];
		$deficiencyPisces = $_POST['deficiency_pisces'];
		$deficiencySagitarius = $_POST['deficiency_sagitarius'];
		$deficiencyScorpio = $_POST['deficiency_scorpio'];
		$deficiencyTaurus = $_POST['deficiency_taurus'];
		$deficiencyVirgo = $_POST['deficiency_virgo'];
		$financeAquarius = $_POST['finance_aquarius'];
		$financeAries = $_POST['finance_aries'];
		$financeCancer = $_POST['finance_cancer'];
		$financeCapricorn = $_POST['finance_capricorn'];
		$financeGemini = $_POST['finance_gemini'];
		$financeLeo = $_POST['finance_leo'];
		$financeLibra = $_POST['finance_libra'];
		$financePisces = $_POST['finance_pisces'];
		$financeSagitarius = $_POST['finance_sagitarius'];
		$financeScorpio = $_POST['finance_scorpio'];
		$financeTaurus = $_POST['finance_taurus'];
		$financeVirgo = $_POST['finance_virgo'];
		$healthAquarius = $_POST['health_aquarius'];
		$healthAries = $_POST['health_aries'];
		$healthCancer = $_POST['health_cancer'];
		$healthCapricorn = $_POST['health_capricorn'];
		$healthGemini = $_POST['health_gemini'];
		$healthLeo = $_POST['health_leo'];
		$healthLibra = $_POST['health_libra'];
		$healthPisces = $_POST['health_pisces'];
		$healthSagitarius = $_POST['health_sagitarius'];
		$healthScorpio = $_POST['health_scorpio'];
		$healthTaurus = $_POST['health_taurus'];
		$healthVirgo = $_POST['health_virgo'];
		$artistMan1 = $_POST['artist_man_1'];
		$artistMan2 = $_POST['artist_man_2'];
		$artistMan3 = $_POST['artist_man_3'];
		$artistMan4 = $_POST['artist_man_4'];
		$artistMan5 = $_POST['artist_man_5'];
		$artistMan6 = $_POST['artist_man_6'];
		$artistMan7 = $_POST['artist_man_7'];
		$artistMan8 = $_POST['artist_man_8'];
		$artistWoman1 = $_POST['artist_woman_1'];
		$artistWoman2 = $_POST['artist_woman_2'];
		$artistWoman3 = $_POST['artist_woman_3'];
		$artistWoman4 = $_POST['artist_woman_4'];
		$artistWoman5 = $_POST['artist_woman_5'];
		$artistWoman6 = $_POST['artist_woman_6'];
		$artistWoman7 = $_POST['artist_woman_7'];
		$artistWoman8 = $_POST['artist_woman_8'];
		$this->db->update('zodiacs', array(
			'common' => $common,
			'romance_aquarius' => $romanceAquarius,
			'romance_aries' => $romanceAries,
			'romance_cancer' => $romanceCancer,
			'romance_capricorn' => $romanceCapricorn,
			'romance_gemini' => $romanceGemini,
			'romance_leo' => $romanceLeo,
			'romance_libra' => $romanceLibra,
			'romance_pisces' => $romancePisces,
			'romance_sagitarius' => $romanceSagitarius,
			'romance_scorpio' => $romanceScorpio,
			'romance_taurus' => $romanceTaurus,
			'romance_virgo' => $romanceVirgo,
			'deficiency_aquarius' => $deficiencyAquarius,
			'deficiency_aries' => $deficiencyAries,
			'deficiency_cancer' => $deficiencyCancer,
			'deficiency_capricorn' => $deficiencyCapricorn,
			'deficiency_gemini' => $deficiencyGemini,
			'deficiency_leo' => $deficiencyLeo,
			'deficiency_libra' => $deficiencyLibra,
			'deficiency_pisces' => $deficiencyPisces,
			'deficiency_sagitarius' => $deficiencySagitarius,
			'deficiency_scorpio' => $deficiencyScorpio,
			'deficiency_taurus' => $deficiencyTaurus,
			'deficiency_virgo' => $deficiencyVirgo,
			'finance_aquarius' => $financeAquarius,
			'finance_aries' => $financeAries,
			'finance_cancer' => $financeCancer,
			'finance_capricorn' => $financeCapricorn,
			'finance_gemini' => $financeGemini,
			'finance_leo' => $financeLeo,
			'finance_libra' => $financeLibra,
			'finance_pisces' => $financePisces,
			'finance_sagitarius' => $financeSagitarius,
			'finance_scorpio' => $financeScorpio,
			'finance_taurus' => $financeTaurus,
			'finance_virgo' => $financeVirgo,
			'health_aquarius' => $healthAquarius,
			'health_aries' => $healthAries,
			'health_cancer' => $healthCancer,
			'health_capricorn' => $healthCapricorn,
			'health_gemini' => $healthGemini,
			'health_leo' => $healthLeo,
			'health_libra' => $healthLibra,
			'health_pisces' => $healthPisces,
			'health_sagitarius' => $healthSagitarius,
			'health_scorpio' => $healthScorpio,
			'health_taurus' => $healthTaurus,
			'health_virgo' => $healthVirgo,
			'artist_man_1' => $artistMan1,
			'artist_man_2' => $artistMan2,
			'artist_man_3' => $artistMan3,
			'artist_man_4' => $artistMan4,
			'artist_man_5' => $artistMan5,
			'artist_man_6' => $artistMan6,
			'artist_man_7' => $artistMan7,
			'artist_man_8' => $artistMan8,
			'artist_woman_1' => $artistWoman1,
			'artist_woman_2' => $artistWoman2,
			'artist_woman_3' => $artistWoman3,
			'artist_woman_4' => $artistWoman4,
			'artist_woman_5' => $artistWoman5,
			'artist_woman_6' => $artistWoman6,
			'artist_woman_7' => $artistWoman7,
			'artist_woman_8' => $artistWoman8
		));
	}
}
