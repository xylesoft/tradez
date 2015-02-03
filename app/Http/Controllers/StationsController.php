<?php 

namespace TradeZ\Http\Controllers;

use TradeZ\Http\Requests;
use TradeZ\Http\Controllers\Controller;
use Input;

use Illuminate\Http\Request;
use TradeZ\SystemStation;

class StationsController extends Controller {

	public function getAddStation()
	{
		
		return view('stations.add');
	}

	public function postAddStation()
	{
		$stationName = Input::get('station_name');
		$systemName = Input::get('system_name');
		$csvRows = explode("\n", str_replace("\r", "", Input::get('csv_content')));
		$headerColumns = str_getcsv(array_shift($csvRows), ';');

		$marketRows = [];
		foreach ($csvRows as $csvRow) {
			// Process each CSV data row

			$rowColumns = str_getcsv($csvRow, ';');
			if (count($rowColumns) == count($headerColumns)) {
				// Just making sure the data row column count matches that of the header column count

				$insertRow = [];
				foreach ($headerColumns as $columnNumber => $column) {

					if (strlen($column) > 0) {
						// Our header column has title, so assume data should exist, so add
						// to array of rows to be inserted into final market array.
						$insertRow[$column] = $rowColumns[$columnNumber];
					}
				}

				// Add resource to market array
				$marketRows[] = $insertRow;
			}
		}

		// Insert record into the DB
		$systemStation = SystemStation::create([
            'system' => $systemName,
            'station' => $stationName
        ]);

        foreach ($marketRows as $row) {
            $systemStation->commodities()->create([
                'commodity' => $row['Commodity'],
                'purchase_value' => (is_numeric($row['Sell'])) ? $row['Sell'] : null,
                'cost_value' => (is_numeric($row['Buy'])) ? $row['Buy'] : null,
                'demand' => (is_numeric($row['Demand'])) ? $row['Demand'] : null,
                'supply' => (is_numeric($row['Supply'])) ? $row['Supply'] : null
            ]);
        }

		var_dump($marketRows);die;
	}
}
