<?php

namespace App\Console\Commands;

use Etherscan\Api\Contract as PolygonscanContract;
use Etherscan\Client as PolygonscanClient;
use Illuminate\Console\Command;
use phpseclib\Math\BigInteger;
use Web3\Contract as Web3Contract;

class FetchAqiChanges extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apple:fetch:aqi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $available = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $polygonScanClient = new PolygonscanClient('YKI9GEHP9TBDZREC4PG5AGSTF2I6WQPPRA');
        $aTokens = config('atokens');

        $this->available = $aTokens;

        foreach ($this->available as $key => $val) {
            $this->available[$key] = 0;
        }

        while (true) {
            foreach ($aTokens as $aToken => $aTokenAddress) {
                try {
                    $polygonScanContract = new PolygonscanContract($polygonScanClient);
                    $abi = $polygonScanContract->getABI($aTokenAddress);

                    $web3 = new Web3Contract('https://rpc-mainnet.matic.quiknode.pro', $abi['result']);
                    $web3->at($aTokenAddress)->call('getCash', [], function ($err, $param) use ($aToken) {
                        if (!isset($param[0])) {
                            //$this->error('Cant get getCash for ' . $aToken . ', skipping');
                            return;
                        }

                        /** @var BigInteger $cash */
                        $cash = $param[0];
                        $available = $cash->toString() / pow(10, 18);

                        if ($this->available[$aToken] != $available) {
                            $this->info($aToken . ': ' . $available . ' (was: ' . $this->available[$aToken] . ')');
                            $this->available[$aToken] = $available;
                        }
                    });
                } catch (\Throwable $e) {
                    //$this->newLine();
                    //$this->line('err');
                    //$this->newLine();
                    continue;
                }
            }

            sleep(10);
        }

        return 0;
    }
}
