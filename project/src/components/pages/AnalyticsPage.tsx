import React from 'react';
import { TrendingUp, TrendingDown, DollarSign, ShoppingBag, Users, Package, Calendar, BarChart3 } from 'lucide-react';

export function AnalyticsPage() {
  // Mock data for charts
  const revenueData = [
    { month: 'Jan', revenue: 42000, orders: 320 },
    { month: 'Feb', revenue: 38000, orders: 285 },
    { month: 'Mar', revenue: 51000, orders: 410 },
    { month: 'Apr', revenue: 46000, orders: 365 },
    { month: 'May', revenue: 58000, orders: 445 },
    { month: 'Jun', revenue: 62000, orders: 485 },
  ];

  const topCategories = [
    { name: 'Salads', revenue: 18500, percentage: 32 },
    { name: 'Bowls', revenue: 15200, percentage: 26 },
    { name: 'Pasta', revenue: 12800, percentage: 22 },
    { name: 'Seafood', revenue: 8900, percentage: 15 },
    { name: 'Wraps', revenue: 2900, percentage: 5 },
  ];

  const maxRevenue = Math.max(...revenueData.map(d => d.revenue));

  return (
    <div className="space-y-6">
      {/* Header */}
      <div>
        <h1 className="text-2xl font-bold text-gray-900">Analytics & Reports</h1>
        <p className="text-gray-600">Detailed insights and performance metrics for your restaurant</p>
      </div>

      {/* Key Metrics */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Total Revenue</p>
              <p className="text-2xl font-bold text-gray-900">$297K</p>
              <div className="flex items-center mt-2">
                <TrendingUp className="w-4 h-4 text-green-500 mr-1" />
                <span className="text-sm font-medium text-green-600">+18.2%</span>
                <span className="text-sm text-gray-500 ml-1">vs last period</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
              <DollarSign className="w-6 h-6 text-green-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Total Orders</p>
              <p className="text-2xl font-bold text-gray-900">2,310</p>
              <div className="flex items-center mt-2">
                <TrendingUp className="w-4 h-4 text-green-500 mr-1" />
                <span className="text-sm font-medium text-green-600">+12.5%</span>
                <span className="text-sm text-gray-500 ml-1">vs last period</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
              <ShoppingBag className="w-6 h-6 text-blue-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Avg Order Value</p>
              <p className="text-2xl font-bold text-gray-900">$128.60</p>
              <div className="flex items-center mt-2">
                <TrendingUp className="w-4 h-4 text-green-500 mr-1" />
                <span className="text-sm font-medium text-green-600">+5.1%</span>
                <span className="text-sm text-gray-500 ml-1">vs last period</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
              <BarChart3 className="w-6 h-6 text-purple-600" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Customer Retention</p>
              <p className="text-2xl font-bold text-gray-900">78.4%</p>
              <div className="flex items-center mt-2">
                <TrendingDown className="w-4 h-4 text-red-500 mr-1" />
                <span className="text-sm font-medium text-red-600">-2.3%</span>
                <span className="text-sm text-gray-500 ml-1">vs last period</span>
              </div>
            </div>
            <div className="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
              <Users className="w-6 h-6 text-orange-600" />
            </div>
          </div>
        </div>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {/* Revenue Chart */}
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between mb-6">
            <div>
              <h2 className="text-xl font-bold text-gray-900">Revenue Trend</h2>
              <p className="text-sm text-gray-500">Monthly revenue and order count</p>
            </div>
            <div className="flex items-center space-x-2 text-green-600">
              <TrendingUp className="w-5 h-5" />
              <span className="text-sm font-medium">+18.2% growth</span>
            </div>
          </div>

          <div className="h-64 flex items-end justify-between space-x-2">
            {revenueData.map((data, index) => (
              <div key={index} className="flex flex-col items-center flex-1">
                <div
                  className="w-full bg-blue-500 rounded-t-sm hover:bg-blue-600 transition-colors cursor-pointer relative group"
                  style={{ height: `${(data.revenue / maxRevenue) * 200}px` }}
                >
                  <div className="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                    <div>${data.revenue.toLocaleString()}</div>
                    <div>{data.orders} orders</div>
                  </div>
                </div>
                <span className="text-xs text-gray-500 mt-2">{data.month}</span>
              </div>
            ))}
          </div>

          <div className="mt-6 grid grid-cols-3 gap-4 pt-4 border-t border-gray-200">
            <div className="text-center">
              <p className="text-lg font-bold text-gray-900">$297K</p>
              <p className="text-sm text-gray-500">Total Revenue</p>
            </div>
            <div className="text-center">
              <p className="text-lg font-bold text-gray-900">2,310</p>
              <p className="text-sm text-gray-500">Total Orders</p>
            </div>
            <div className="text-center">
              <p className="text-lg font-bold text-gray-900">$128.60</p>
              <p className="text-sm text-gray-500">Avg. Order</p>
            </div>
          </div>
        </div>

        {/* Top Categories */}
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between mb-6">
            <h2 className="text-xl font-bold text-gray-900">Top Categories</h2>
            <button className="text-blue-600 hover:text-blue-700 font-medium text-sm">
              View All
            </button>
          </div>

          <div className="space-y-4">
            {topCategories.map((category, index) => (
              <div key={index} className="flex items-center justify-between">
                <div className="flex items-center space-x-3">
                  <div className="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <Package className="w-4 h-4 text-blue-600" />
                  </div>
                  <div>
                    <p className="font-medium text-gray-900">{category.name}</p>
                    <p className="text-sm text-gray-500">${category.revenue.toLocaleString()}</p>
                  </div>
                </div>
                <div className="flex items-center space-x-3">
                  <div className="w-24 bg-gray-200 rounded-full h-2">
                    <div 
                      className="bg-blue-600 h-2 rounded-full"
                      style={{ width: `${category.percentage}%` }}
                    ></div>
                  </div>
                  <span className="text-sm font-medium text-gray-900 w-8">{category.percentage}%</span>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

      {/* Additional Analytics */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {/* Peak Hours */}
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <h3 className="text-lg font-bold text-gray-900 mb-4">Peak Hours</h3>
          <div className="space-y-3">
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">12:00 PM - 1:00 PM</span>
              <span className="text-sm font-medium">342 orders</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">7:00 PM - 8:00 PM</span>
              <span className="text-sm font-medium">298 orders</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">6:00 PM - 7:00 PM</span>
              <span className="text-sm font-medium">267 orders</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">1:00 PM - 2:00 PM</span>
              <span className="text-sm font-medium">234 orders</span>
            </div>
          </div>
        </div>

        {/* Customer Insights */}
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <h3 className="text-lg font-bold text-gray-900 mb-4">Customer Insights</h3>
          <div className="space-y-3">
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">New Customers</span>
              <span className="text-sm font-medium text-green-600">+47 this month</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">Returning Customers</span>
              <span className="text-sm font-medium">78.4%</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">Avg. Orders per Customer</span>
              <span className="text-sm font-medium">2.6</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">Customer Satisfaction</span>
              <span className="text-sm font-medium">4.7/5.0</span>
            </div>
          </div>
        </div>

        {/* Performance Metrics */}
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <h3 className="text-lg font-bold text-gray-900 mb-4">Performance</h3>
          <div className="space-y-3">
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">Avg. Prep Time</span>
              <span className="text-sm font-medium">18 min</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">Order Accuracy</span>
              <span className="text-sm font-medium text-green-600">98.2%</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">On-time Delivery</span>
              <span className="text-sm font-medium">94.7%</span>
            </div>
            <div className="flex justify-between items-center">
              <span className="text-sm text-gray-600">Cancellation Rate</span>
              <span className="text-sm font-medium text-red-600">2.1%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}