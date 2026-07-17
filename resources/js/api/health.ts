import axios from 'axios';

export type HealthResponse = {
    status: 'ok'
    app: string
}

export async function getHealth () : Promise<HealthResponse> {
    const response = await axios.get<HealthResponse>('/api/health')

    return response.data;
}