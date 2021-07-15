<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\LastBlock;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchNewAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apple:fetch:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $aTokens = config('atokens');

        $lastBlock = optional(LastBlock::orderBy('block', 'desc')->limit(1)->first())->block ?: 0;
        $currentBlock = $this->getCurrentBlock();

        $endpoint = 'https://api.polygonscan.com/';
        $endpoint .= 'api?module=account&action=tokentx&address=%s';
        $endpoint .= '&startblock=%s&endblock=%s&sort=asc';
        $endpoint .= '&apikey=AK9MXCX94XGEGQHWC8C218P6AJTZHMPNYT';

        foreach ($aTokens as $aToken) {
            // address, start block, end block
            $url = sprintf($endpoint, $aToken, $lastBlock + 1, $currentBlock);

            $resp = Http::get($url)->json();

            if ($resp['status'] == 1) {
                foreach ($resp['result'] as $result) {
                    Address::firstOrCreate(['address' => $result['to']]);
                    Address::firstOrCreate(['address' => $result['from']]);
                }
            }
        }

        // Update last fetched block
        LastBlock::create([
            'block' => $currentBlock
        ]);

        return 0;
    }

    protected function getCurrentBlock()
    {
        $url = 'https://gasstation-mainnet.matic.network/';
        $resp = Http::get($url)->json();

        return $resp['blockNumber'];
    }
}
