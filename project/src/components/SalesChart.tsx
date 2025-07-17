import React from 'react';
import { TrendingUp } from 'lucide-react';

export function SalesChart() {
  // Mock data for the chart visualization
  const salesData = [
    { month: 'Jan', sales: 4200 },
    { month: 'Feb', sales: 3800 },
    { month: 'Mar', sales: 5100 },
    { month: 'Apr', sales: 4600 },
    { month: 'May', sales: 5800 },
    { month: 'Jun', sales: 6200 },
    { month: 'Jul', sales: 5900 },
    { month: 'Aug', sales: 6800 },
    { month: 'Sep', sales: 7200 },
    { month: 'Oct', sales: 6900 },
    { month: 'Nov', sales: 7800 },
    { month: 'Dec', sales: 8500 }
  ];

  const maxSales = Math.max(...salesData.map(d => d.sales));

  return (
    <div className="bg-white rounded-xl border border-gray-200 p-6">
      <div className="flex items-center justify-between mb-6">
        <div>
          <h2 className="text-xl font-bold text-gray-900">Sales Overview</h2>
          <p className="text-sm text-gray-500">Monthly sales performance</p>
        </div>
        <div className="flex items-center space-x-2 text-green-600">
          <TrendingUp className="w-5 h-5" />
          <span className="text-sm font-medium">+12.5% vs last year</span>
        </div>
      </div>

      <div className="h-64 flex items-end justify-between space-x-2">
        {salesData.map((data, index) => (
          <div key={index} className="flex flex-col items-center flex-1">
            <div
              className="w-full bg-blue-500 rounded-t-sm hover:bg-blue-600 transition-colors cursor-pointer relative group"
              style={{ height: `${(data.sales / maxSales) * 200}px` }}
            >
              <div className="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                ${data.sales.toLocaleString()}
              </div>
            </div>
            <span className="text-xs text-gray-500 mt-2">{data.month}</span>
          </div>
        ))}
      </div>

      <div className="mt-6 grid grid-cols-3 gap-4 pt-4 border-t border-gray-200">
        <div className="text-center">
          <p className="text-2xl font-bold text-gray-900">$68.2K</p>
          <p className="text-sm text-gray-500">Total Revenue</p>
        </div>
        <div className="text-center">
          <p className="text-2xl font-bold text-gray-900">2,847</p>
          <p className="text-sm text-gray-500">Orders</p>
        </div>
        <div className="text-center">
          <p className="text-2xl font-bold text-gray-900">$23.95</p>
          <p className="text-sm text-gray-500">Avg. Order</p>
        </div>
      </div>
    </div>
  );
}