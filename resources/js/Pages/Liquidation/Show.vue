<template>
    <layout title="Apple liquidations">

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        Total Borrowed
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        Borrow / Collateral
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        Borrower Address
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="position in positions">
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        ${{ position.borrowed }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ position.health }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ position.address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-10 mt-10">

            <div class="shadow col-span-1 sm:rounded-lg p-5">

                <h2 class="uppercase">Repay borrow</h2>

                <hr class="my-4">

                <div class="col-span-6 sm:col-span-3">
                    <label for="borrow" class="block text-sm font-medium text-gray-700">Select borrow to close</label>
                    <select id="borrow" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>USDT</option>
                        <option>ETH</option>
                    </select>
                </div>

                <hr class="my-4">

                <div class="flex justify-between">
                    <div>Price</div>
                    <div>100</div>
                </div>

                <hr class="my-4">

                <div class="flex justify-between">
                    <div>User borrowed</div>
                    <div>200</div>
                </div>

                <hr class="my-4">

                <div class="flex justify-between">
                    <div>Max quantity</div>
                    <div>300</div>
                </div>

                <div class="mt-6 text-lg">
                    <label class="block text-sm font-medium text-gray-700">Amount to close</label>
                    <input type="number" class="mt-1 px-2 py-3 block w-full border border-gray-300 rounded-md">
                </div>

            </div>

            <div class="shadow col-span-1 sm:rounded-lg p-5">

                <h2 class="uppercase">Receive Collateral</h2>

                <hr class="my-4">

                <div class="col-span-6 sm:col-span-3">
                    <label for="collateral" class="block text-sm font-medium text-gray-700">Select desired collateral</label>
                    <select id="collateral" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>USDT</option>
                        <option>ETH</option>
                    </select>
                </div>

                <hr class="my-4">

                <div class="flex justify-between">
                    <div>Price</div>
                    <div>100</div>
                </div>

                <hr class="my-4">

                <div class="flex justify-between">
                    <div>Bonus Price</div>
                    <div>200</div>
                </div>

                <hr class="my-4">

                <div class="flex justify-between">
                    <div>User Supplied</div>
                    <div>300</div>
                </div>

                <hr class="my-4">

                <div class="flex justify-between">
                    <div>You Will Receive</div>
                    <div>400</div>
                </div>

                <button type="button" class="mt-6 inline-flex items-center px-5 py-3 text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    LIQUIDATE
                </button>

            </div>

        </div>

    </layout>
</template>

<script>
    import Layout from '../Layout';

    export default {
        components: {
            Layout
        },
        props: {
            positions: Object
        }
    };
</script>
