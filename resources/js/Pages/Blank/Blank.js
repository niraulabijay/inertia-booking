import React from 'react';
import Helmet from 'react-helmet';
import { InertiaLink } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';

export default function Dashboard() {
    return (
        <Layout>
        <div>
            <Helmet>
                <title>BlankPage</title>
            </Helmet>
        </div>
        </Layout>
    )
}