<?php

	class Ovelse {

		public $id;
		public $navn;
		public $verdensrekord;
		public $rekordholder;

		/**
		 * Ovelse constructor.
		 *
		 * @param $id
		 * @param $navn
		 * @param $verdensrekord
		 * @param $rekordholder
		 */
		public function __construct( $id, $navn, $verdensrekord, $rekordholder ) {
			$this->id = $id;
			$this->navn = $navn;
			$this->verdensrekord = $verdensrekord;
			$this->rekordholder = $rekordholder;
		}

	}

