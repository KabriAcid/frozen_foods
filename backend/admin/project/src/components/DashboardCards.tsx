import React from 'react';
import { TrendingUp, TrendingDown, DollarSign, ShoppingBag, Users, Package } from 'lucide-react';

interface MetricCardProps {
  title: string;
  value: string;
  change: string;
  changeType: 'increase' | 'decrease';
  icon: React.ReactNode;
  color: string;
}

function MetricCard({ title, value, change, changeType, icon, color }: MetricCardProps) {
  return (
    <div className="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
      <div className="flex items-center justify-between">
        <div>
          <p className="text-sm font-medium text-gray-600 mb-1">{title}</p>
          <p className="text-3xl font-bold text-gray-900">{value}</p>
          <div className="flex items-center mt-2">
            {changeType === 'increase' ? (
              <TrendingUp className="w-4 h-4 text-green-500 mr-1" />
            ) : (
              <TrendingDown className="w-4 h-4 text-red-500 mr-1" />
            )}
            <span className={`text-sm font-medium ${
              changeType === 'increase' ? 'text-green-600' : 'text-red-600'
            }`}>
              {change}
            </span>
            <span className="text-sm text-gray-500 ml-1">vs last month</span>
          </div>
        </div>
        <div className={`w-12 h-12 rounded-lg flex items-center justify-center ${color}`}>
          {icon}
        </div>
      </div>
    </div>
  );
}

export function DashboardCards() {
  const metrics = [
    {
      title: 'Total Revenue',
      value: '$45,231',
      change: '+12.5%',
      changeType: 'increase' as const,
      icon: <DollarSign className="w-6 h-6 text-green-600" />,
      color: 'bg-green-100'
    },
    {
      title: 'Total Orders',
      value: '1,429',
      change: '+8.2%',
      changeType: 'increase' as const,
      icon: <ShoppingBag className="w-6 h-6 text-blue-600" />,
      color: 'bg-blue-100'
    },
    {
      title: 'Active Customers',
      value: '892',
      change: '+15.3%',
      changeType: 'increase' as const,
      icon: <Users className="w-6 h-6 text-purple-600" />,
      color: 'bg-purple-100'
    },
    {
      title: 'Products Sold',
      value: '2,847',
      change: '-2.4%',
      changeType: 'decrease' as const,
      icon: <Package className="w-6 h-6 text-orange-600" />,
      color: 'bg-orange-100'
    }
  ];

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      {metrics.map((metric, index) => (
        <MetricCard key={index} {...metric} />
      ))}
    </div>
  );
}