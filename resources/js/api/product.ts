import { apiClient } from './client';
import type { ApiResponse, Product } from '../types/api';

export async function getProduct(slug: string): Promise<Product> {
    const response = await apiClient.get<ApiResponse<Product>>(
        `/products/${encodeURIComponent(slug)}`,
    );

    return response.data.data;
}