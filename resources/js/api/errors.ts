import axios from 'axios';

import type {
    ValidationErrorResponse,
    ValidationErrors,
} from '../types/api';

export function getValidationErrors(
    error: unknown,
): ValidationErrors | null {
    if (
        !axios.isAxiosError<ValidationErrorResponse>(error) ||
        error.response?.status !== 422
    ) {
        return null;
    }

    return error.response.data.errors;
}