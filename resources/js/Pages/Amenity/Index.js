import React from 'react';
import Helmet from 'react-helmet';
import { InertiaLink, usePage } from '@inertiajs/inertia-react';
import Layout from '@/Shared/Layout';
import Icon from '@/Shared/Icon';
import SearchFilter from '@/Shared/SearchFilter';
import Pagination from '@/Shared/Pagination';

export default function Dashboard() {
    // const { amenities } = usePage();
    // console.log(amenities)
    // const { links, data } = amenities;
    return (
        <Layout>
            <div>
                <Helmet>
                    <title>Amenities</title>
                </Helmet>
                {/*<div>*/}
                    {/*<h1 className="mb-8 font-bold text-3xl">Amenities</h1>*/}
                    {/*<div className="mb-6 flex justify-between items-center">*/}
                        {/*<SearchFilter />*/}
                        {/*<InertiaLink*/}
                            {/*className="btn-indigo"*/}
                            {/*href={route('admin.amenities.create')}*/}
                        {/*>*/}
                            {/*<span>Create</span>*/}
                            {/*<span className="hidden md:inline"> Amenity</span>*/}
                        {/*</InertiaLink>*/}
                    {/*</div>*/}
                    {/*<div className="bg-white rounded shadow overflow-x-auto">*/}
                        {/*<table className="w-full whitespace-no-wrap">*/}
                            {/*<thead>*/}
                            {/*<tr className="text-left font-bold">*/}
                                {/*<th className="px-6 pt-5 pb-4">Name</th>*/}
                                {/*<th className="px-6 pt-5 pb-4">Status</th>*/}
                                {/*<th className="px-6 pt-5 pb-4" colSpan="2">*/}
                                    {/*Image*/}
                                {/*</th>*/}
                            {/*</tr>*/}
                            {/*</thead>*/}
                            {/*<tbody>*/}
                            {/*{data.map(({ id, name, status, image }) => {*/}
                                {/*return (*/}
                                    {/*<tr*/}
                                        {/*key={id}*/}
                                        {/*className="hover:bg-gray-100 focus-within:bg-gray-100"*/}
                                    {/*>*/}
                                        {/*<td className="border-t">*/}
                                            {/*<InertiaLink*/}
                                                {/*href={route('organizations.edit', id)}*/}
                                                {/*className="px-6 py-4 flex items-center focus:text-indigo-700"*/}
                                            {/*>*/}
                                                {/*{name}*/}
                                                {/*{deleted_at && (*/}
                                                    {/*<Icon*/}
                                                        {/*name="trash"*/}
                                                        {/*className="flex-shrink-0 w-3 h-3 text-gray-400 fill-current ml-2"*/}
                                                    {/*/>*/}
                                                {/*)}*/}
                                            {/*</InertiaLink>*/}
                                        {/*</td>*/}
                                        {/*<td className="border-t">*/}
                                            {/*<InertiaLink*/}
                                                {/*tabIndex="-1"*/}
                                                {/*href={route('organizations.edit', id)}*/}
                                                {/*className="px-6 py-4 flex items-center focus:text-indigo"*/}
                                            {/*>*/}
                                                {/*{status}*/}
                                            {/*</InertiaLink>*/}
                                        {/*</td>*/}
                                        {/*<td className="border-t">*/}
                                            {/*<InertiaLink*/}
                                                {/*tabIndex="-1"*/}
                                                {/*href={route('organizations.edit', id)}*/}
                                                {/*className="px-6 py-4 flex items-center focus:text-indigo"*/}
                                            {/*>*/}
                                                {/*{image}*/}
                                            {/*</InertiaLink>*/}
                                        {/*</td>*/}
                                        {/*<td className="border-t w-px">*/}
                                            {/*<InertiaLink*/}
                                                {/*tabIndex="-1"*/}
                                                {/*href={route('amenities.edit', id)}*/}
                                                {/*className="px-4 flex items-center"*/}
                                            {/*>*/}
                                                {/*<Icon*/}
                                                    {/*name="cheveron-right"*/}
                                                    {/*className="block w-6 h-6 text-gray-400 fill-current"*/}
                                                {/*/>*/}
                                            {/*</InertiaLink>*/}
                                        {/*</td>*/}
                                    {/*</tr>*/}
                                {/*);*/}
                            {/*})}*/}
                            {/*{data.length === 0 && (*/}
                                {/*<tr>*/}
                                    {/*<td className="border-t px-6 py-4" colSpan="4">*/}
                                        {/*No Amenities found.*/}
                                    {/*</td>*/}
                                {/*</tr>*/}
                            {/*)}*/}
                            {/*</tbody>*/}
                        {/*</table>*/}
                    {/*</div>*/}
                    {/*<Pagination links={links} />*/}
                {/*</div>*/}
            </div>
        </Layout>
    )
}