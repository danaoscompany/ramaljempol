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
	
	public function update_zodiac_in_settings() {
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
		$this->db->where('type', 'common');
		$this->db->update('zodiacs', array(
			'description_in' => $common
		));
		$this->db->where('type', 'romance_aquarius');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceAquarius
		));
		$this->db->where('type', 'romance_aries');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceAries
		));
		$this->db->where('type', 'romance_cancer');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceCancer
		));
		$this->db->where('type', 'romance_capricorn');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceCapricorn
		));
		$this->db->where('type', 'romance_gemini');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceGemini
		));
		$this->db->where('type', 'romance_leo');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceLeo
		));
		$this->db->where('type', 'romance_libra');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceLibra
		));
		$this->db->where('type', 'romance_pisces');
		$this->db->update('zodiacs', array(
			'description_in' => $romancePisces
		));
		$this->db->where('type', 'romance_sagitarius');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceSagitarius
		));
		$this->db->where('type', 'romance_scorpio');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceScorpio
		));
		$this->db->where('type', 'romance_taurus');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceTaurus
		));
		$this->db->where('type', 'romance_virgo');
		$this->db->update('zodiacs', array(
			'description_in' => $romanceVirgo
		));
		
		
		$this->db->where('type', 'deficiency_aquarius');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyAquarius
		));
		$this->db->where('type', 'deficiency_aries');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyAries
		));
		$this->db->where('type', 'deficiency_cancer');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyCancer
		));
		$this->db->where('type', 'deficiency_capricorn');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyCapricorn
		));
		$this->db->where('type', 'deficiency_gemini');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyGemini
		));
		$this->db->where('type', 'deficiency_leo');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyLeo
		));
		$this->db->where('type', 'deficiency_libra');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyLibra
		));
		$this->db->where('type', 'deficiency_pisces');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyPisces
		));
		$this->db->where('type', 'deficiency_sagitarius');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencySagitarius
		));
		$this->db->where('type', 'deficiency_scorpio');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyScorpio
		));
		$this->db->where('type', 'deficiency_taurus');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyTaurus
		));
		$this->db->where('type', 'deficiency_virgo');
		$this->db->update('zodiacs', array(
			'description_in' => $deficiencyVirgo
		));
		
		
		$this->db->where('type', 'finance_aquarius');
		$this->db->update('zodiacs', array(
			'description_in' => $financeAquarius
		));
		$this->db->where('type', 'finance_aries');
		$this->db->update('zodiacs', array(
			'description_in' => $financeAries
		));
		$this->db->where('type', 'finance_cancer');
		$this->db->update('zodiacs', array(
			'description_in' => $financeCancer
		));
		$this->db->where('type', 'finance_capricorn');
		$this->db->update('zodiacs', array(
			'description_in' => $financeCapricorn
		));
		$this->db->where('type', 'finance_gemini');
		$this->db->update('zodiacs', array(
			'description_in' => $financeGemini
		));
		$this->db->where('type', 'finance_leo');
		$this->db->update('zodiacs', array(
			'description_in' => $financeLeo
		));
		$this->db->where('type', 'finance_libra');
		$this->db->update('zodiacs', array(
			'description_in' => $financeLibra
		));
		$this->db->where('type', 'finance_pisces');
		$this->db->update('zodiacs', array(
			'description_in' => $financePisces
		));
		$this->db->where('type', 'finance_sagitarius');
		$this->db->update('zodiacs', array(
			'description_in' => $financeSagitarius
		));
		$this->db->where('type', 'finance_scorpio');
		$this->db->update('zodiacs', array(
			'description_in' => $financeScorpio
		));
		$this->db->where('type', 'finance_taurus');
		$this->db->update('zodiacs', array(
			'description_in' => $financeTaurus
		));
		$this->db->where('type', 'finance_virgo');
		$this->db->update('zodiacs', array(
			'description_in' => $financeVirgo
		));
		
		$this->db->where('type', 'health_aquarius');
		$this->db->update('zodiacs', array(
			'description_in' => $healthAquarius
		));
		$this->db->where('type', 'health_aries');
		$this->db->update('zodiacs', array(
			'description_in' => $healthAries
		));
		$this->db->where('type', 'health_cancer');
		$this->db->update('zodiacs', array(
			'description_in' => $healthCancer
		));
		$this->db->where('type', 'health_capricorn');
		$this->db->update('zodiacs', array(
			'description_in' => $healthCapricorn
		));
		$this->db->where('type', 'health_gemini');
		$this->db->update('zodiacs', array(
			'description_in' => $healthGemini
		));
		$this->db->where('type', 'health_leo');
		$this->db->update('zodiacs', array(
			'description_in' => $healthLeo
		));
		$this->db->where('type', 'health_libra');
		$this->db->update('zodiacs', array(
			'description_in' => $healthLibra
		));
		$this->db->where('type', 'health_pisces');
		$this->db->update('zodiacs', array(
			'description_in' => $healthPisces
		));
		$this->db->where('type', 'health_sagitarius');
		$this->db->update('zodiacs', array(
			'description_in' => $healthSagitarius
		));
		$this->db->where('type', 'health_scorpio');
		$this->db->update('zodiacs', array(
			'description_in' => $healthScorpio
		));
		$this->db->where('type', 'health_taurus');
		$this->db->update('zodiacs', array(
			'description_in' => $healthTaurus
		));
		$this->db->where('type', 'health_virgo');
		$this->db->update('zodiacs', array(
			'description_in' => $healthVirgo
		));
		
		
		
		$this->db->where('type', 'artist_man_1');
		$this->db->update('zodiacs', array(
			'description_in' => $artist_manAquarius
		));
		$this->db->where('type', 'artist_man_2');
		$this->db->update('zodiacs', array(
			'description_in' => $artistMan1
		));
		$this->db->where('type', 'artist_man_3');
		$this->db->update('zodiacs', array(
			'description_in' => $artistMan2
		));
		$this->db->where('type', 'artist_man_4');
		$this->db->update('zodiacs', array(
			'description_in' => $artistMan3
		));
		$this->db->where('type', 'artist_man_5');
		$this->db->update('zodiacs', array(
			'description_in' => $artistMan4
		));
		$this->db->where('type', 'artist_man_6');
		$this->db->update('zodiacs', array(
			'description_in' => $artistMan5
		));
		$this->db->where('type', 'artist_man_7');
		$this->db->update('zodiacs', array(
			'description_in' => $artistMan6
		));
		$this->db->where('type', 'artist_man_8');
		$this->db->update('zodiacs', array(
			'description_in' => $artistMan7
		));
		
		$this->db->where('type', 'artist_woman_1');
		$this->db->update('zodiacs', array(
			'description_in' => $artist_womanAquarius
		));
		$this->db->where('type', 'artist_woman_2');
		$this->db->update('zodiacs', array(
			'description_in' => $artistWoman1
		));
		$this->db->where('type', 'artist_woman_3');
		$this->db->update('zodiacs', array(
			'description_in' => $artistWoman2
		));
		$this->db->where('type', 'artist_woman_4');
		$this->db->update('zodiacs', array(
			'description_in' => $artistWoman3
		));
		$this->db->where('type', 'artist_woman_5');
		$this->db->update('zodiacs', array(
			'description_in' => $artistWoman4
		));
		$this->db->where('type', 'artist_woman_6');
		$this->db->update('zodiacs', array(
			'description_in' => $artistWoman5
		));
		$this->db->where('type', 'artist_woman_7');
		$this->db->update('zodiacs', array(
			'description_in' => $artistWoman6
		));
		$this->db->where('type', 'artist_woman_8');
		$this->db->update('zodiacs', array(
			'description_in' => $artistWoman7
		));
	}
	
	public function update_zodiac_en_settings() {
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
		$this->db->where('type', 'common');
		$this->db->update('zodiacs', array(
			'description_en' => $common
		));
		$this->db->where('type', 'romance_aquarius');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceAquarius
		));
		$this->db->where('type', 'romance_aries');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceAries
		));
		$this->db->where('type', 'romance_cancer');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceCancer
		));
		$this->db->where('type', 'romance_capricorn');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceCapricorn
		));
		$this->db->where('type', 'romance_gemini');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceGemini
		));
		$this->db->where('type', 'romance_leo');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceLeo
		));
		$this->db->where('type', 'romance_libra');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceLibra
		));
		$this->db->where('type', 'romance_pisces');
		$this->db->update('zodiacs', array(
			'description_en' => $romancePisces
		));
		$this->db->where('type', 'romance_sagitarius');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceSagitarius
		));
		$this->db->where('type', 'romance_scorpio');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceScorpio
		));
		$this->db->where('type', 'romance_taurus');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceTaurus
		));
		$this->db->where('type', 'romance_virgo');
		$this->db->update('zodiacs', array(
			'description_en' => $romanceVirgo
		));
		
		
		$this->db->where('type', 'deficiency_aquarius');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyAquarius
		));
		$this->db->where('type', 'deficiency_aries');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyAries
		));
		$this->db->where('type', 'deficiency_cancer');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyCancer
		));
		$this->db->where('type', 'deficiency_capricorn');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyCapricorn
		));
		$this->db->where('type', 'deficiency_gemini');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyGemini
		));
		$this->db->where('type', 'deficiency_leo');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyLeo
		));
		$this->db->where('type', 'deficiency_libra');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyLibra
		));
		$this->db->where('type', 'deficiency_pisces');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyPisces
		));
		$this->db->where('type', 'deficiency_sagitarius');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencySagitarius
		));
		$this->db->where('type', 'deficiency_scorpio');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyScorpio
		));
		$this->db->where('type', 'deficiency_taurus');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyTaurus
		));
		$this->db->where('type', 'deficiency_virgo');
		$this->db->update('zodiacs', array(
			'description_en' => $deficiencyVirgo
		));
		
		
		$this->db->where('type', 'finance_aquarius');
		$this->db->update('zodiacs', array(
			'description_en' => $financeAquarius
		));
		$this->db->where('type', 'finance_aries');
		$this->db->update('zodiacs', array(
			'description_en' => $financeAries
		));
		$this->db->where('type', 'finance_cancer');
		$this->db->update('zodiacs', array(
			'description_en' => $financeCancer
		));
		$this->db->where('type', 'finance_capricorn');
		$this->db->update('zodiacs', array(
			'description_en' => $financeCapricorn
		));
		$this->db->where('type', 'finance_gemini');
		$this->db->update('zodiacs', array(
			'description_en' => $financeGemini
		));
		$this->db->where('type', 'finance_leo');
		$this->db->update('zodiacs', array(
			'description_en' => $financeLeo
		));
		$this->db->where('type', 'finance_libra');
		$this->db->update('zodiacs', array(
			'description_en' => $financeLibra
		));
		$this->db->where('type', 'finance_pisces');
		$this->db->update('zodiacs', array(
			'description_en' => $financePisces
		));
		$this->db->where('type', 'finance_sagitarius');
		$this->db->update('zodiacs', array(
			'description_en' => $financeSagitarius
		));
		$this->db->where('type', 'finance_scorpio');
		$this->db->update('zodiacs', array(
			'description_en' => $financeScorpio
		));
		$this->db->where('type', 'finance_taurus');
		$this->db->update('zodiacs', array(
			'description_en' => $financeTaurus
		));
		$this->db->where('type', 'finance_virgo');
		$this->db->update('zodiacs', array(
			'description_en' => $financeVirgo
		));
		
		$this->db->where('type', 'health_aquarius');
		$this->db->update('zodiacs', array(
			'description_en' => $healthAquarius
		));
		$this->db->where('type', 'health_aries');
		$this->db->update('zodiacs', array(
			'description_en' => $healthAries
		));
		$this->db->where('type', 'health_cancer');
		$this->db->update('zodiacs', array(
			'description_en' => $healthCancer
		));
		$this->db->where('type', 'health_capricorn');
		$this->db->update('zodiacs', array(
			'description_en' => $healthCapricorn
		));
		$this->db->where('type', 'health_gemini');
		$this->db->update('zodiacs', array(
			'description_en' => $healthGemini
		));
		$this->db->where('type', 'health_leo');
		$this->db->update('zodiacs', array(
			'description_en' => $healthLeo
		));
		$this->db->where('type', 'health_libra');
		$this->db->update('zodiacs', array(
			'description_en' => $healthLibra
		));
		$this->db->where('type', 'health_pisces');
		$this->db->update('zodiacs', array(
			'description_en' => $healthPisces
		));
		$this->db->where('type', 'health_sagitarius');
		$this->db->update('zodiacs', array(
			'description_en' => $healthSagitarius
		));
		$this->db->where('type', 'health_scorpio');
		$this->db->update('zodiacs', array(
			'description_en' => $healthScorpio
		));
		$this->db->where('type', 'health_taurus');
		$this->db->update('zodiacs', array(
			'description_en' => $healthTaurus
		));
		$this->db->where('type', 'health_virgo');
		$this->db->update('zodiacs', array(
			'description_en' => $healthVirgo
		));
		
		
		
		$this->db->where('type', 'artist_man_1');
		$this->db->update('zodiacs', array(
			'description_en' => $artist_manAquarius
		));
		$this->db->where('type', 'artist_man_2');
		$this->db->update('zodiacs', array(
			'description_en' => $artistMan1
		));
		$this->db->where('type', 'artist_man_3');
		$this->db->update('zodiacs', array(
			'description_en' => $artistMan2
		));
		$this->db->where('type', 'artist_man_4');
		$this->db->update('zodiacs', array(
			'description_en' => $artistMan3
		));
		$this->db->where('type', 'artist_man_5');
		$this->db->update('zodiacs', array(
			'description_en' => $artistMan4
		));
		$this->db->where('type', 'artist_man_6');
		$this->db->update('zodiacs', array(
			'description_en' => $artistMan5
		));
		$this->db->where('type', 'artist_man_7');
		$this->db->update('zodiacs', array(
			'description_en' => $artistMan6
		));
		$this->db->where('type', 'artist_man_8');
		$this->db->update('zodiacs', array(
			'description_en' => $artistMan7
		));
		
		$this->db->where('type', 'artist_woman_1');
		$this->db->update('zodiacs', array(
			'description_en' => $artist_womanAquarius
		));
		$this->db->where('type', 'artist_woman_2');
		$this->db->update('zodiacs', array(
			'description_en' => $artistWoman1
		));
		$this->db->where('type', 'artist_woman_3');
		$this->db->update('zodiacs', array(
			'description_en' => $artistWoman2
		));
		$this->db->where('type', 'artist_woman_4');
		$this->db->update('zodiacs', array(
			'description_en' => $artistWoman3
		));
		$this->db->where('type', 'artist_woman_5');
		$this->db->update('zodiacs', array(
			'description_en' => $artistWoman4
		));
		$this->db->where('type', 'artist_woman_6');
		$this->db->update('zodiacs', array(
			'description_en' => $artistWoman5
		));
		$this->db->where('type', 'artist_woman_7');
		$this->db->update('zodiacs', array(
			'description_en' => $artistWoman6
		));
		$this->db->where('type', 'artist_woman_8');
		$this->db->update('zodiacs', array(
			'description_en' => $artistWoman7
		));
	}
}
