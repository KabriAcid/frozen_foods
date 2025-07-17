import React from 'react';
import { Star, TrendingUp, TrendingDown } from 'lucide-react';

interface Product {
  id: string;
  name: string;
  image: string;
  sales: number;
  revenue: number;
  rating: number;
  change: number;
}

const topProducts: Product[] = [
  {
    id: '1',
    name: 'Easy Greek Salad',
    image: 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=100',
    sales: 342,
    revenue: 7524.58,
    rating: 4.9,
    change: 12.5
  },
  {
    id: '2',
    name: 'Mediterranean Pasta',
    image: 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=100',
    sales: 298,
    revenue: 5513.00,
    rating: 4.7,
    change: 8.3
  },
  {
    id: '3',
    name: 'Grilled Chicken Bowl',
    image: 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=100',
    sales: 267,
    revenue: 4806.60,
    rating: 4.8,
    change: -2.1
  },
  {
    id: '4',
    name: 'Quinoa Power Bowl',
    image: 'https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg?auto=compress&cs=tinysrgb&w=100',
    sales: 234,
    revenue: 4212.00,
    rating: 4.6,
    change: 15.7
  },
  {
    id: '5',
    name: 'Salmon Teriyaki',
    image: 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=100',
    sales: 189,
    revenue: 3780.00,
    rating: 4.9,
    change: 6.2
  }
];

export function TopProducts() {
  return (
    <div className="bg-white rounded-xl border border-gray-200 p-6">
      <div className="flex items-center justify-between mb-6">
        <h2 className="text-xl font-bold text-gray-900">Top Products</h2>
        <button className="text-blue-600 hover:text-blue-700 font-medium text-sm">
          View All
        </button>
      </div>

      <div className="space-y-4">
        {topProducts.map((product, index) => (
          <div key={product.id} className="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
            <div className="flex-shrink-0">
              <span className="text-sm font-medium text-gray-500 w-6">#{index + 1}</span>
            </div>
            
            <img
              src={product.image}
              alt={product.name}
              className="w-12 h-12 rounded-lg object-cover"
            />
            
            <div className="flex-1 min-w-0">
              <h3 className="text-sm font-medium text-gray-900 truncate">{product.name}</h3>
              <div className="flex items-center space-x-1 mt-1">
                <Star className="w-3 h-3 text-yellow-400 fill-current" />
                <span className="text-xs text-gray-500">{product.rating}</span>
              </div>
            </div>
            
            <div className="text-right">
              <p className="text-sm font-medium text-gray-900">{product.sales} sold</p>
              <p className="text-xs text-gray-500">${product.revenue.toLocaleString()}</p>
            </div>
            
            <div className="flex items-center space-x-1">
              {product.change > 0 ? (
                <TrendingUp className="w-4 h-4 text-green-500" />
              ) : (
                <TrendingDown className="w-4 h-4 text-red-500" />
              )}
              <span className={`text-xs font-medium ${
                product.change > 0 ? 'text-green-600' : 'text-red-600'
              }`}>
                {product.change > 0 ? '+' : ''}{product.change}%
              </span>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}