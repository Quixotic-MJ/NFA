@extends('Components.layouts.app')

@section('title', 'Forms Management - NFA ERP System')
@section('page-title', 'Forms Management')
@section('page-description', 'Create and manage requisitions, purchase requests, and purchase orders')

@section('content')
    <!-- Forms Header -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mb-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Forms Management</h1>
                <p class="text-gray-600 mt-1">Create and manage procurement forms and documents</p>
            </div>
            <div class="flex space-x-3">
                <button id="newRequisitionBtn" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>New Requisition</span>
                </button>
                <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors flex items-center space-x-2">
                    <i class="fas fa-history"></i>
                    <span>Form History</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Forms Navigation -->
    <div class="bg-white border border-gray-200 p-6 rounded-lg mb-6">
        <div class="flex space-x-1 bg-gray-100 p-1 rounded-lg">
            <button class="form-tab flex-1 py-2 px-4 text-sm font-medium rounded-md transition-colors active" data-tab="requisition">
                <i class="fas fa-clipboard-list mr-2"></i>
                Requisition Forms
            </button>
            <button class="form-tab flex-1 py-2 px-4 text-sm font-medium rounded-md transition-colors" data-tab="purchase-request">
                <i class="fas fa-file-alt mr-2"></i>
                Purchase Requests
            </button>
            <button class="form-tab flex-1 py-2 px-4 text-sm font-medium rounded-md transition-colors" data-tab="purchase-order">
                <i class="fas fa-file-invoice mr-2"></i>
                Purchase Orders
            </button>
        </div>
    </div>

    <!-- Forms Content -->
    <div class="space-y-6">
        <!-- Requisition Forms Tab -->
        <div id="requisition-tab" class="form-tab-content active">
            <!-- Requisition Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                @php
                    $requisitionStats = [
                        ['label' => 'Total Requisitions', 'value' => '142', 'icon' => 'fas fa-clipboard-list', 'color' => 'blue'],
                        ['label' => 'Pending Approval', 'value' => '24', 'icon' => 'fas fa-clock', 'color' => 'yellow'],
                        ['label' => 'Approved', 'value' => '98', 'icon' => 'fas fa-check-circle', 'color' => 'green'],
                        ['label' => 'Rejected', 'value' => '20', 'icon' => 'fas fa-times-circle', 'color' => 'red']
                    ];
                @endphp
                
                @foreach($requisitionStats as $stat)
                    <div class="bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 bg-{{ $stat['color'] }}-100 rounded-lg mr-4">
                                <i class="{{ $stat['icon'] }} text-{{ $stat['color'] }}-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">{{ $stat['label'] }}</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Requisition Form -->
            <div class="bg-white border border-gray-200 rounded-lg">
                <div class="border-b border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900">New Requisition Form</h2>
                    <p class="text-gray-600 mt-1">Request items from warehouse inventory</p>
                </div>
                
                <form id="requisitionForm" class="p-6 space-y-6">
                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Requisition Number</label>
                            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-50" value="REQ-2024-00143" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="{{ date('Y-m-d') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                            <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-blue-500 outline-none">
                                <option>Select Department</option>
                                <option>Warehouse Operations</option>
                                <option>Procurement</option>
                                <option>Administration</option>
                                <option>Finance</option>
                                <option>Sales & Distribution</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Requested By</label>
                            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="Juan Dela Cruz">
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-md font-medium text-gray-900">Requested Items</h3>
                            <button type="button" id="addItemBtn" class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors flex items-center space-x-1">
                                <i class="fas fa-plus"></i>
                                <span>Add Item</span>
                            </button>
                        </div>
                        
                        <div class="overflow-hidden border border-gray-200 rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Description</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Purpose</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="requisitionItems" class="bg-white divide-y divide-gray-200">
                                    <!-- Items will be added here dynamically -->
                                    <tr class="requisition-item">
                                        <td class="px-4 py-3">
                                            <select class="w-full border border-gray-300 rounded px-2 py-1 text-sm">
                                                <option>Select Item</option>
                                                <option>Premium Rice</option>
                                                <option>Regular Rice</option>
                                                <option>Yellow Corn</option>
                                                <option>Wheat Flour</option>
                                                <option>Grains</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-sm text-gray-900">Rice</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" class="w-20 border border-gray-300 rounded px-2 py-1 text-sm" value="100" min="1">
                                        </td>
                                        <td class="px-4 py-3">
                                            <select class="w-full border border-gray-300 rounded px-2 py-1 text-sm">
                                                <option>kg</option>
                                                <option>sacks</option>
                                                <option>bags</option>
                                                <option>liters</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-sm" placeholder="Purpose of request">
                                        </td>
                                        <td class="px-4 py-3">
                                            <button type="button" class="remove-item text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Remarks/Justification</label>
                        <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-blue-500 outline-none" rows="3" placeholder="Provide justification for this requisition..."></textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                        <button type="button" class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors">
                            Save Draft
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition-colors">
                            Submit Requisition
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Purchase Request Tab -->
        <div id="purchase-request-tab" class="form-tab-content hidden">
            <!-- Purchase Request Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                @php
                    $purchaseRequestStats = [
                        ['label' => 'Total PRs', 'value' => '89', 'icon' => 'fas fa-file-alt', 'color' => 'blue'],
                        ['label' => 'Pending', 'value' => '15', 'icon' => 'fas fa-hourglass-half', 'color' => 'yellow'],
                        ['label' => 'Approved', 'value' => '62', 'icon' => 'fas fa-check', 'color' => 'green'],
                        ['label' => 'Converted to PO', 'value' => '47', 'icon' => 'fas fa-exchange-alt', 'color' => 'purple']
                    ];
                @endphp
                
                @foreach($purchaseRequestStats as $stat)
                    <div class="bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 bg-{{ $stat['color'] }}-100 rounded-lg mr-4">
                                <i class="{{ $stat['icon'] }} text-{{ $stat['color'] }}-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">{{ $stat['label'] }}</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Purchase Request Form -->
            <div class="bg-white border border-gray-200 rounded-lg">
                <div class="border-b border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900">Purchase Request Form</h2>
                    <p class="text-gray-600 mt-1">Formal request for procurement of goods and services</p>
                </div>
                
                <form id="purchaseRequestForm" class="p-6 space-y-6">
                    <!-- Header Information -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">PR Number</label>
                            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-50" value="PR-2024-00890" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date Prepared</label>
                            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="{{ date('Y-m-d') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                            <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-blue-500 outline-none">
                                <option>Select Department</option>
                                <option>Warehouse Operations</option>
                                <option>Procurement</option>
                                <option>Administration</option>
                            </select>
                        </div>
                    </div>

                    <!-- Supplier Information -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-md font-medium text-gray-900 mb-4">Supplier Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Supplier Name</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-blue-500 outline-none">
                                    <option>Select Supplier</option>
                                    <option>Golden Grains Corporation</option>
                                    <option>Philippine Rice Distributors</option>
                                    <option>Agri-Supply Chain Inc.</option>
                                    <option>National Grain Providers</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Date</label>
                                <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Items and Pricing -->
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-md font-medium text-gray-900">Requested Items & Pricing</h3>
                            <button type="button" class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors flex items-center space-x-1">
                                <i class="fas fa-plus"></i>
                                <span>Add Item</span>
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3">
                                            <select class="w-full border border-gray-300 rounded px-2 py-1 text-sm">
                                                <option>Premium Rice</option>
                                                <option>Regular Rice</option>
                                                <option>Yellow Corn</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-sm" value="High-quality rice grains">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" class="w-20 border border-gray-300 rounded px-2 py-1 text-sm" value="500">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" class="w-24 border border-gray-300 rounded px-2 py-1 text-sm" value="45.50" step="0.01">
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-sm font-medium">₱22,750.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-gray-50">
                                    <tr>
                                        <td colspan="4" class="px-4 py-3 text-right text-sm font-medium text-gray-900">Total Amount:</td>
                                        <td class="px-4 py-3 text-sm font-bold text-gray-900">₱22,750.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Approval Section -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-md font-medium text-gray-900 mb-4">Approval</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Requested By</label>
                                <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="Maria Santos">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Department Head</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                    <option>Select Approver</option>
                                    <option>Roberto Garcia</option>
                                    <option>Ana Reyes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                        <button type="button" class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors">
                            Save as Draft
                        </button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 transition-colors">
                            Submit Purchase Request
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Purchase Order Tab -->
        <div id="purchase-order-tab" class="form-tab-content hidden">
            <!-- Purchase Order Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                @php
                    $purchaseOrderStats = [
                        ['label' => 'Total POs', 'value' => '156', 'icon' => 'fas fa-file-invoice', 'color' => 'blue'],
                        ['label' => 'Pending', 'value' => '18', 'icon' => 'fas fa-clock', 'color' => 'yellow'],
                        ['label' => 'Completed', 'value' => '124', 'icon' => 'fas fa-check-double', 'color' => 'green'],
                        ['label' => 'Overdue', 'value' => '14', 'icon' => 'fas fa-exclamation-triangle', 'color' => 'red']
                    ];
                @endphp
                
                @foreach($purchaseOrderStats as $stat)
                    <div class="bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 bg-{{ $stat['color'] }}-100 rounded-lg mr-4">
                                <i class="{{ $stat['icon'] }} text-{{ $stat['color'] }}-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">{{ $stat['label'] }}</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Purchase Order Form -->
            <div class="bg-white border border-gray-200 rounded-lg">
                <div class="border-b border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900">Purchase Order</h2>
                    <p class="text-gray-600 mt-1">Official document for purchasing goods from suppliers</p>
                </div>
                
                <form id="purchaseOrderForm" class="p-6 space-y-6">
                    <!-- PO Header -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- NFA Information -->
                        <div>
                            <h3 class="text-md font-medium text-gray-900 mb-4">NFA Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">PO Number</label>
                                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-50" value="PO-2024-01560" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Date Issued</label>
                                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="{{ date('Y-m-d') }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">PR Reference</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                        <option>PR-2024-00890</option>
                                        <option>PR-2024-00891</option>
                                        <option>PR-2024-00892</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Supplier Information -->
                        <div>
                            <h3 class="text-md font-medium text-gray-900 mb-4">Supplier Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Supplier Name</label>
                                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="Golden Grains Corporation">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                    <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm" rows="2">123 Agri Business Park, Metro Manila</textarea>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">TIN</label>
                                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="123-456-789-000">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Contact</label>
                                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="(02) 8123-4567">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Information -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-md font-medium text-gray-900 mb-4">Delivery Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Date</label>
                                <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Address</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                    <option>Main Warehouse - Manila</option>
                                    <option>Region IV-A Warehouse</option>
                                    <option>Region V Warehouse</option>
                                    <option>Region VI Warehouse</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Payment Terms</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                    <option>Net 30 Days</option>
                                    <option>Net 45 Days</option>
                                    <option>Upon Delivery</option>
                                    <option>50% Advance, 50% Delivery</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-md font-medium text-gray-900">Order Items</h3>
                            <button type="button" class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors flex items-center space-x-1">
                                <i class="fas fa-plus"></i>
                                <span>Add Item</span>
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Code</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3">
                                            <input type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-sm" value="RIC-PRM-001">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-sm" value="Premium Rice Grains">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" class="w-20 border border-gray-300 rounded px-2 py-1 text-sm" value="500">
                                        </td>
                                        <td class="px-4 py-3">
                                            <select class="w-full border border-gray-300 rounded px-2 py-1 text-sm">
                                                <option>kg</option>
                                                <option>sacks</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" class="w-24 border border-gray-300 rounded px-2 py-1 text-sm" value="45.50" step="0.01">
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-sm font-medium">₱22,750.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">
                                            <input type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-sm" value="CORN-YLW-001">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-sm" value="Yellow Corn Grains">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" class="w-20 border border-gray-300 rounded px-2 py-1 text-sm" value="300">
                                        </td>
                                        <td class="px-4 py-3">
                                            <select class="w-full border border-gray-300 rounded px-2 py-1 text-sm">
                                                <option>kg</option>
                                                <option>sacks</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" class="w-24 border border-gray-300 rounded px-2 py-1 text-sm" value="38.75" step="0.01">
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-sm font-medium">₱11,625.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-gray-50">
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-right text-sm font-medium text-gray-900">Subtotal:</td>
                                        <td class="px-4 py-3 text-sm font-medium text-gray-900">₱34,375.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-right text-sm font-medium text-gray-900">Tax (12%):</td>
                                        <td class="px-4 py-3 text-sm font-medium text-gray-900">₱4,125.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-right text-sm font-bold text-gray-900">Total Amount:</td>
                                        <td class="px-4 py-3 text-sm font-bold text-gray-900">₱38,500.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-md font-medium text-gray-900 mb-4">Terms & Conditions</h3>
                        <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm" rows="4" placeholder="Enter specific terms and conditions for this purchase order...">Delivery must be made on or before the specified date. All items must meet NFA quality standards. Payment will be processed upon satisfactory delivery and inspection.</textarea>
                    </div>

                    <!-- Authorization -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-md font-medium text-gray-900 mb-4">Authorization</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Prepared By</label>
                                <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" value="Juan Dela Cruz">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Approved By</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                                    <option>Select Approving Officer</option>
                                    <option>Maria Santos - Procurement Head</option>
                                    <option>Roberto Garcia - Finance Manager</option>
                                    <option>Ana Reyes - Operations Director</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                        <button type="button" class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 transition-colors">
                            Save Draft
                        </button>
                        <button type="submit" class="px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded hover:bg-purple-700 transition-colors">
                            Generate Purchase Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab Navigation
        const formTabs = document.querySelectorAll('.form-tab');
        const tabContents = document.querySelectorAll('.form-tab-content');

        formTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                
                // Update active tab
                formTabs.forEach(t => t.classList.remove('active', 'bg-white', 'text-blue-700'));
                this.classList.add('active', 'bg-white', 'text-blue-700');
                
                // Show target content
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                    content.classList.remove('active');
                });
                
                document.getElementById(`${targetTab}-tab`).classList.remove('hidden');
                document.getElementById(`${targetTab}-tab`).classList.add('active');
            });
        });

        // Requisition Form - Add Item
        const addItemBtn = document.getElementById('addItemBtn');
        const requisitionItems = document.getElementById('requisitionItems');

        if (addItemBtn) {
            addItemBtn.addEventListener('click', function() {
                const newItem = document.createElement('tr');
                newItem.className = 'requisition-item';
                newItem.innerHTML = `
                    <td class="px-4 py-3">
                        <select class="w-full border border-gray-300 rounded px-2 py-1 text-sm">
                            <option>Select Item</option>
                            <option>Premium Rice</option>
                            <option>Regular Rice</option>
                            <option>Yellow Corn</option>
                            <option>Wheat Flour</option>
                            <option>Grains</option>
                        </select>
                    </td>
                    <td class="px-4 py-3">
                        <span class="text-sm text-gray-900">-</span>
                    </td>
                    <td class="px-4 py-3">
                        <input type="number" class="w-20 border border-gray-300 rounded px-2 py-1 text-sm" value="1" min="1">
                    </td>
                    <td class="px-4 py-3">
                        <select class="w-full border border-gray-300 rounded px-2 py-1 text-sm">
                            <option>kg</option>
                            <option>sacks</option>
                            <option>bags</option>
                            <option>liters</option>
                        </select>
                    </td>
                    <td class="px-4 py-3">
                        <input type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-sm" placeholder="Purpose of request">
                    </td>
                    <td class="px-4 py-3">
                        <button type="button" class="remove-item text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                requisitionItems.appendChild(newItem);
                
                // Add event listener to the new remove button
                newItem.querySelector('.remove-item').addEventListener('click', function() {
                    this.closest('.requisition-item').remove();
                });
            });
        }

        // Remove item functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-item')) {
                e.target.closest('.requisition-item').remove();
            }
        });

        // Form Submissions
        const requisitionForm = document.getElementById('requisitionForm');
        const purchaseRequestForm = document.getElementById('purchaseRequestForm');
        const purchaseOrderForm = document.getElementById('purchaseOrderForm');

        if (requisitionForm) {
            requisitionForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add form validation and submission logic
                alert('Requisition submitted successfully!');
            });
        }

        if (purchaseRequestForm) {
            purchaseRequestForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add form validation and submission logic
                alert('Purchase Request submitted successfully!');
            });
        }

        if (purchaseOrderForm) {
            purchaseOrderForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add form validation and submission logic
                alert('Purchase Order generated successfully!');
            });
        }

        // Auto-calculate amounts in purchase forms
        function calculateAmounts() {
            // Implementation for auto-calculation
            console.log('Calculating amounts...');
        }

        // Initialize any additional functionality
        initializeFormFunctionality();
    });

    function initializeFormFunctionality() {
        // Add any additional form initialization logic here
        console.log('Forms management initialized');
    }
</script>
@endsection