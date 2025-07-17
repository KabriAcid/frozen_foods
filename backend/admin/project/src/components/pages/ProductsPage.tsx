import React, { useState } from 'react';
import { Search, Filter, Download, Eye, Edit, Trash2, Plus, Star, Package, DollarSign, TrendingUp } from 'lucide-react';

interface Product {
  id: string;
  name: string;
  description: string;
  price: number;
  category: string;
  image: string;
  stock: number;
  sold: number;
  rating: number;
  reviews: number;
  status: 'active' | 'inactive' | 'out-of-stock';
  createdDate: string;
}

const products: Product[] = [
  {
    id: 'PROD-001',
    name: 'Easy Greek Salad',
    description: 'Fresh Mediterranean salad with crisp lettuce, tomatoes, olives, and feta cheese',
    price: 21.99,
    category: 'Salads',
    image: 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=300',
    stock: 50,
    sold: 342,
    rating: 4.9,
    reviews: 127,
    status: 'active',
    createdDate: '2023-06-15'
  },
  {
    id: 'PROD-002',
    name: 'Mediterranean Pasta',
    description: 'Delicious pasta with sun-dried tomatoes, olives, and herbs',
    price: 18.50,
    category: 'Pasta',
    image: 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=300',
    stock: 35,
    sold: 298,
    rating: 4.7,
    reviews: 89,
    status: 'active',
    createdDate: '2023-07-22'
  },
  {
    id: 'PROD-003',
    name: 'Grilled Chicken Bowl',
    description: 'Healthy grilled chicken with quinoa, vegetables, and tahini sauce',
    price: 24.99,
    category: 'Bowls',
    image: 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=300',
    stock: 0,
    sold: 267,
    rating: 4.8,
    reviews: 156,
    status: 'out-of-stock',
    createdDate: '2023-08-10'
  },
  {
    id: 'PROD-004',
    name: 'Quinoa Power Bowl',
    description: 'Nutritious quinoa bowl with roasted vegetables and avocado',
    price: 19.99,
    category: 'Bowls',
    image: 'https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg?auto=compress&cs=tinysrgb&w=300',
    stock: 42,
    sold: 234,
    rating: 4.6,
    reviews: 78,
    status: 'active',
    createdDate: '2023-09-05'
  },
  {
    id: 'PROD-005',
    name: 'Salmon Teriyaki',
    description: 'Grilled salmon with teriyaki glaze, served with steamed rice',
    price: 28.99,
    category: 'Seafood',
    image: 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=300',
    stock: 25,
    sold: 189,
    rating: 4.9,
    reviews: 203,
    status: 'active',
    createdDate: '2023-10-12'
  },
  {
    id: 'PROD-006',
    name: 'Veggie Wrap',
    description: 'Fresh vegetables wrapped in a whole wheat tortilla with hummus',
    price: 14.99,
    category: 'Wraps',
    image: 'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=300',
    stock: 60,
    sold: 156,
    rating: 4.4,
    reviews: 45,
    status: 'inactive',
    createdDate: '2023-11-18'
  }
];

const categories = ['All', 'Salads', 'Pasta', 'Bowls', 'Seafood', 'Wraps'];

function getStatusColor(status: Product['status']) {
  switch (status) {
    case 'active':
      return 'bg-green-100 text-green-800';
    case 'inactive':
      return 'bg-gray-100 text-gray-800';
    case 'out-of-stock':
      return 'bg-red-100 text-red-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
}

export function ProductsPage() {
  const [selectedProduct, setSelectedProduct] = useState<Product | null>(null);
  const [categoryFilter, setCategoryFilter] = useState<string>('All');
  const [statusFilter, setStatusFilter] = useState<string>('all');

  const filteredProducts = products.filter(product => {
    const categoryMatch = categoryFilter === 'All' || product.category === categoryFilter;
    const statusMatch = statusFilter === 'all' || product.status === statusFilter;
    return categoryMatch && statusMatch;
  });

  return (
    <div className="space-y-6">
      {/* Header */}
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold text-gray-900">Product Management</h1>
          <p className="text-gray-600">Manage your menu items and inventory</p>
        </div>
        <button className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center space-x-2">
          <Plus className="w-4 h-4" />
          <span>Add Product</span>
        </button>
      </div>

      {/* Stats Cards */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Total Products</p>
              <p className="text-2xl font-bold text-gray-900">156</p>
            </div>
            <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
              <Package className="w-6 h-6 text-blue-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Active Products</p>
              <p className="text-2xl font-bold text-green-600">142</p>
            </div>
            <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
              <TrendingUp className="w-6 h-6 text-green-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Out of Stock</p>
              <p className="text-2xl font-bold text-red-600">8</p>
            </div>
            <div className="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
              <Package className="w-6 h-6 text-red-600" />
            </div>
          </div>
        </div>
        <div className="bg-white rounded-xl border border-gray-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-sm text-gray-600">Avg. Rating</p>
              <p className="text-2xl font-bold text-yellow-600">4.7</p>
            </div>
            <div className="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
              <Star className="w-6 h-6 text-yellow-600" />
            </div>
          </div>
        </div>
      </div>

      {/* Filters and Search */}
      <div className="bg-white rounded-xl border border-gray-200 p-6">
        <div className="flex flex-col sm:flex-row gap-4">
          <div className="flex-1">
            <div className="relative">
              <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
              <input
                type="text"
                placeholder="Search products by name or description..."
                className="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
            </div>
          </div>
          <select 
            value={categoryFilter}
            onChange={(e) => setCategoryFilter(e.target.value)}
            className="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
          >
            {categories.map(category => (
              <option key={category} value={category}>{category}</option>
            ))}
          </select>
          <select 
            value={statusFilter}
            onChange={(e) => setStatusFilter(e.target.value)}
            className="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
          >
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="out-of-stock">Out of Stock</option>
          </select>
          <button className="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center space-x-2">
            <Filter className="w-4 h-4" />
            <span>Filter</span>
          </button>
          <button className="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center space-x-2">
            <Download className="w-4 h-4" />
            <span>Export</span>
          </button>
        </div>
      </div>

      {/* Products Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {filteredProducts.map((product) => (
          <div key={product.id} className="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
            <div className="relative">
              <img
                src={product.image}
                alt={product.name}
                className="w-full h-48 object-cover"
              />
              <span className={`absolute top-3 right-3 px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(product.status)}`}>
                {product.status.replace('-', ' ')}
              </span>
            </div>
            
            <div className="p-6">
              <div className="flex items-start justify-between mb-2">
                <h3 className="font-medium text-gray-900 text-lg">{product.name}</h3>
                <span className="text-lg font-bold text-gray-900">${product.price}</span>
              </div>
              
              <p className="text-sm text-gray-600 mb-3 line-clamp-2">{product.description}</p>
              
              <div className="flex items-center justify-between mb-3">
                <span className="text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded-full">{product.category}</span>
                <div className="flex items-center space-x-1">
                  <Star className="w-4 h-4 text-yellow-400 fill-current" />
                  <span className="text-sm font-medium">{product.rating}</span>
                  <span className="text-sm text-gray-500">({product.reviews})</span>
                </div>
              </div>
              
              <div className="grid grid-cols-2 gap-4 mb-4">
                <div className="text-center">
                  <p className="text-lg font-bold text-gray-900">{product.stock}</p>
                  <p className="text-xs text-gray-500">In Stock</p>
                </div>
                <div className="text-center">
                  <p className="text-lg font-bold text-gray-900">{product.sold}</p>
                  <p className="text-xs text-gray-500">Sold</p>
                </div>
              </div>
              
              <div className="flex items-center space-x-2">
                <button 
                  onClick={() => setSelectedProduct(product)}
                  className="flex-1 bg-blue-600 text-white py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors text-sm flex items-center justify-center space-x-1"
                >
                  <Eye className="w-4 h-4" />
                  <span>View</span>
                </button>
                <button className="p-2 text-gray-400 hover:text-green-600 transition-colors border border-gray-300 rounded-lg">
                  <Edit className="w-4 h-4" />
                </button>
                <button className="p-2 text-gray-400 hover:text-red-600 transition-colors border border-gray-300 rounded-lg">
                  <Trash2 className="w-4 h-4" />
                </button>
              </div>
            </div>
          </div>
        ))}
      </div>

      {/* Product Detail Modal */}
      {selectedProduct && (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
          <div className="bg-white rounded-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div className="p-6 border-b border-gray-200">
              <div className="flex items-center justify-between">
                <h2 className="text-xl font-bold text-gray-900">Product Details - {selectedProduct.name}</h2>
                <button 
                  onClick={() => setSelectedProduct(null)}
                  className="text-gray-400 hover:text-gray-600"
                >
                  ×
                </button>
              </div>
            </div>
            <div className="p-6">
              <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                  <img
                    src={selectedProduct.image}
                    alt={selectedProduct.name}
                    className="w-full h-64 object-cover rounded-lg mb-4"
                  />
                  <div className="space-y-3">
                    <div className="flex justify-between">
                      <span className="text-gray-500">Product ID:</span>
                      <span className="font-medium">{selectedProduct.id}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Category:</span>
                      <span className="font-medium">{selectedProduct.category}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Created:</span>
                      <span className="font-medium">{selectedProduct.createdDate}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-500">Status:</span>
                      <span className={`px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(selectedProduct.status)}`}>
                        {selectedProduct.status.replace('-', ' ')}
                      </span>
                    </div>
                  </div>
                </div>
                
                <div className="space-y-6">
                  <div>
                    <h3 className="text-lg font-medium text-gray-900 mb-2">{selectedProduct.name}</h3>
                    <p className="text-gray-600 mb-4">{selectedProduct.description}</p>
                    <div className="flex items-center space-x-4 mb-4">
                      <span className="text-2xl font-bold text-gray-900">${selectedProduct.price}</span>
                      <div className="flex items-center space-x-1">
                        <Star className="w-5 h-5 text-yellow-400 fill-current" />
                        <span className="font-medium">{selectedProduct.rating}</span>
                        <span className="text-gray-500">({selectedProduct.reviews} reviews)</span>
                      </div>
                    </div>
                  </div>
                  
                  <div className="grid grid-cols-2 gap-4">
                    <div className="bg-gray-50 rounded-lg p-4 text-center">
                      <p className="text-2xl font-bold text-gray-900">{selectedProduct.stock}</p>
                      <p className="text-sm text-gray-500">Units in Stock</p>
                    </div>
                    <div className="bg-gray-50 rounded-lg p-4 text-center">
                      <p className="text-2xl font-bold text-gray-900">{selectedProduct.sold}</p>
                      <p className="text-sm text-gray-500">Units Sold</p>
                    </div>
                  </div>
                  
                  <div className="bg-gray-50 rounded-lg p-4">
                    <h4 className="font-medium text-gray-900 mb-2">Revenue</h4>
                    <p className="text-2xl font-bold text-green-600">
                      ${(selectedProduct.sold * selectedProduct.price).toLocaleString()}
                    </p>
                    <p className="text-sm text-gray-500">Total revenue generated</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}