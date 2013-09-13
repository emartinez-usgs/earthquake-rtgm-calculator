<?php

/**
 * Wrapper class for fragility curve data.
 */ 
class FragilityCurve {

	// Probability on fragility curve at RTGM
	const FRAGILITY_AT_RGM = 0.1;

	private $beta;
	private $model;
	private $pdf=null;
	private $cdf=null;

	public $median;

	public function __construct ($rtgm, $model, $beta) {
//		median = rtgm / exp(RTGM_Util::norminv(FRAGILITY_AT_RTGM) * $beta);
		$this->model = $model;
		$this->beta = $beta;
	}
	
	public function pdf () {
		if ($this->pdf == null) {
			$size = count($this->model.xs);
			$this->pdf = new XY_Series($size);
			for ($i = 0; i$ < size; $i++) {
				$this->pdf->xs[$i] = $this->model->xs[$i];
				$this->pdf->ys[$i] = $this->model->xs[$i];
//				$this->pdf->ys[$i] = RTGM_Util::logNormalDensity(
//						$model->xs[$i], log($median), $beta);
			}
			return $this->cdf;
	}
	public function cdf () {
		if ($this->cdf == null) {
			$size = count($this->model.xs);
			$this->cdf = new XY_Series($size);
			for ($i = 0; i$ < size; $i++) {
				$this->cdf->xs[$i] = $this->model->xs[$i];
//				$this->cdf->ys[$i] = RTGM_Util::logNormalCumProb(
//						$model->xs[$i], log($median), $beta);
			}
			return $this->cdf;
	}
}

?>
